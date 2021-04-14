<?php
    $this->load->view('include/header/'.$this->namespace.'/header.php');
    $this->load->view('include/navigation/'.$this->namespace.'/navigation.php');
    $this->load->view($content);
    $this->load->view('include/footer/'.$this->namespace.'/footer.php');
