<li class="header">MAIN NAVIGATION</li>

<li class="<?php if($this->uri->segment(2) == 'admin') { echo 'active'; } ?>">
    <a href="<?= base_url() ?>admin/admin">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
</li>

<li class="<?php if($this->uri->segment(2) == 'Mitra' or $this->uri->segment(2) == 'Kategori' or $this->uri->segment(2) == 'Produk') { echo 'active'; } ?> treeview">
    <a href="#">
        <i class="fa fa-files-o"></i>
        <span>Kelola Data</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>

    <ul class="treeview-menu">
        <li class="<?php if($this->uri->segment(2) == 'Mitra') { echo 'active'; } ?>">
            <a href="<?php echo base_url()?>admin/Mitra">
                <i class="fa fa-circle-o"></i> Data Mitra
            </a>
        </li>
        
        <li class="<?php if($this->uri->segment(2) == 'Kategori') { echo 'active'; } ?>">
            <a href="<?php echo base_url()?>admin/Kategori">
                <i class="fa fa-circle-o"></i> Data Kategori
            </a>
        </li>
        
        <li class="<?php if($this->uri->segment(2) == 'Produk') { echo 'active'; } ?>">
            <a href="<?php echo base_url()?>admin/Produk">
                <i class="fa fa-circle-o"></i> Data Produk 
            </a>
        </li>
    </ul>
</li>