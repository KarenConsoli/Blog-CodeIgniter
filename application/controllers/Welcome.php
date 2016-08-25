<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('blogger_model','b_model',true);
        $this->load->model('welcome_model','w_model',true);
        $this->load->model('super_admin_model');
    }
    
    public function index($start=0) {
        
        $data = array();
        $data['result']=  $this->b_model->select_all_blogs(10,$start);
       
        $this->load->library('pagination');
        $config['base_url']=base_url().'welcome/index';
        $config['total_rows']=  $this->b_model->select_blog_count();
        $config['per_page']=10;
        $this->pagination->initialize($config);
        $data['blog']=  $this->pagination->create_links();
        
        $data['maincontent'] = $this->load->view('home_message', $data, true);
        $data['all_category']=  $this->w_model->select_all_category();
        $data['title'] = "Blog";
        $data['archives']="h";
        $this->load->view('home', $data);
    }

     public function rss_feed($start=0) {
        $data = array();
        $data=$this->b_model->select_all_blogs(10,$start);
         $rssfeed = '<?xml version="1.0" encoding="ISO-8859-1"?>';
                $rssfeed .= '<rss version="2.0">';
                $rssfeed .= '<channel>';
                $rssfeed .= '<title>CodeIgniter Blog</title>';
                $rssfeed .= '<link>http://localhost/blog_s</link>';
                $rssfeed .= '<description>This is a CodeIgniter Blog </description>';
                $rssfeed .= '<language>en-us</language>';
                $rssfeed .= '<copyright>Copyright (C) 2016 www.kbcon.com.ar</copyright>';
      
       foreach ($data as $val ) {
            $rssfeed .= '<item>';
            $rssfeed .= '<title>' .$val->blog_title. '</title>';
            $rssfeed .= '<description>Read More...</description>';
            $rssfeed .= '<link>http://localhost/blog_s/welcome/single_blog/' .  $val->blog_id . '</link>';
            $rssfeed .= '<pubDate>' . $val->created_date_time. '</pubDate>';
            $rssfeed .= '</item>';
       }
              $rssfeed .= '</channel>';
        $rssfeed .= '</rss>';
        echo $rssfeed;
    }


    public function gallery() {
        $data = array();
        $data['all_category']=  $this->w_model->select_all_category();
        $data['maincontent'] = $this->load->view('gallery', '', true);

        $data['title'] = "Photes";
        $data['header'] = "1";
        $this->load->view('home', $data);
    }
    public function single_blog($blog_id=null){
        if ($blog_id==NULL) {
            $blog_id=$this->session->userdata('blog_id');
            //$this->session->unset_userdata('blog_id');
        }
        $data=array();
        $data['result']=  $this->b_model->select_blog_by_blog_id($blog_id);
        $data['comments']=  $this->b_model->select_comments_by_blog_id($blog_id);
        $cont=0;
        foreach($data['comments'] as $val){
            $cont++;
        }
        $data['cont_comments']=$cont;
        
        
      $data['maincontent']=  $this->load->view('single_blog',$data,true);
        $data['all_category']=  $this->w_model->select_all_category();
        $data['title']="Blog";
        $data['archives']="h";
        $this->load->view('home',$data);
        
    }

      public function export_pdf(){

        $user_id = $this->input->post('user',true);

        $blog_id = $this->input->post('blog',true);
        
        $desc = $this->input->post('desc',true);
      
        
          
        $this->load->library('Pdf');

                // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
         $user = array();
        $user = $this->b_model->select_user_by_user_id($user_id);
        
        
        $blog = array();
        $blog=$this->b_model->select_blog_by_blog_id($blog_id);
        
        $pdf->SetAuthor($user->email_address);
        $pdf->SetTitle($blog->blog_title);
        
        // set default header data
        $user_name=$user->last_name . " " . $user->first_name  ;
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $blog->blog_title, "by ". $user_name,  array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        
        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        

        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();
        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
      
        // set JPEG quality
        $pdf->setJPEGQuality(75);

        // Image method signature:
        // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)

        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

        
       
        // set text shadow effect
       // $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

        $html ='<h2 style="text-align: center;font-size: 24px;"><strong><a href="http://localhost/blog_s/welcome/single_blog/'.$blog->blog_id .'">'.$blog->blog_title.'</a></strong></h2><a  href="'.base_url().'welcome/single_blog/'.$blog->blog_id.'"><img src="'. base_url().'blog_images/'.$blog->blog_image.'" alt=" " class="img-responsive" /></a><div class="story"><p style="text-align: justify;font-size: 14px;"><p></p>'.$desc.'</p><p style="text-align: right"><strong>'.$user_name.'</strong> <br/>'.$user->email_address.' <br/>'.$blog->created_date_time.'</p></hr></div>';
        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

     


        // ---------------------------------------------------------

        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output('example_001.pdf', 'I');
        
    }
    public function save_comments(){
        if(!$_POST){
            redirect('welcome/single_blog');
        }
        $user_id=$this->session->userdata('user_id');
                if ($user_id==null) {
                    
                redirect('login/user_login');}
                else{
        $data=array();
        $data['user_id']=  $user_id;
        $data['blog_id']=  $this->input->post('blog_id',true);
        $data['comments_description']=  $this->input->post('comments_description',true);
        
                
                
        $this->w_model->save_comments_info($data);
        $sdata=array();
        $sdata['blog_id']=$data['blog_id'];
        $this->session->set_userdata($sdata); 
        redirect('Welcome/single_blog');
                }
    }
    public function active_user_account($user_id){
        $this->w_model->active_user_account_status($user_id);
        $data['user'] = $user_id;
        $data['maincontent']=  $this->load->view('activation_status',$data,true);
        $data['all_category']=  $this->w_model->select_all_category();
        $data['title']="Blog";
        $data['archives']="h";
        $this->load->view('home',$data);
        
        
    }
    
    public function single_category($category_id){
        /*if($category_id==NULL){
            $category_id=  $this->session->uesrdata('category_id');
            $this->session->unset_userdata('category_id');
            
        }*/
          //$category_id=  $this->session->userdata('category_id');
        $data=array();
        $data['result']=  $this->w_model->select_blog_by_category_id($category_id);
        //$data['comments']=  $this->w_model->select_blog_by_category_id($category_id);
        $data['maincontent']=  $this->load->view('single_category',$data,true);
        $data['all_category']=  $this->w_model->select_all_category();
        $data['title']="Blog";
        $data['archives']="h";
        $this->load->view('home',$data);
    }
 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */