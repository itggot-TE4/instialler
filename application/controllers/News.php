<?php
class News extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'News archive';

        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug = NULL)
    {
        $data['news_item'] = $this->news_model->get_news($slug);

        if (empty($data['news_item'])) {
            show_404();
        }

        $data['title'] = $data['news_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a news item';

        $this->form_validation->set_rules('title', 'Title', 'required|min_length[6]|unique[News.title]');
        $this->form_validation->set_rules('text', 'Text', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('news/create');
            $this->load->view('templates/footer');
        } else {
            $news = $this->news_model->set_news();

            redirect('/news/' . $news['slug'], 'location', 301);
        }
    }
    public function edit($slug = NULL)
    {
        $data['news_item'] = $this->news_model->get_news($slug);

        if (empty($data['news_item'])) {
            show_404();
        }
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Edit a news item';
        $id =$data['news_item']['id'];

        $this->form_validation->set_rules('title', 'Title', 'required|min_length[6]|edit_unique[News.title.'.$id.']');
        $this->form_validation->set_rules('text', 'Text', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('news/edit', $data);
            $this->load->view('templates/footer');
        } else {
            echo $slug;
             $news = $this->news_model->update_news($id);
            redirect('/news/' . $news['slug'], 'location', 301);
        }
    }
    public function delete_row($id) {

        $this->load->model("News_model");
        $this->News_model->did_delete_row($id);
        redirect('/news/', 'location', 301);

        }
}
