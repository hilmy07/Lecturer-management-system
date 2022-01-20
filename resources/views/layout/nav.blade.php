<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    
    <li class="{{ request()->is('/') ? 'active' : ''}}">
      <a href="/">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      </a>
      
    </li>

    <li class="{{ request()->is('data_fakultas') ? 'active' : ''}}"><a href="/data_fakultas"><i class="fa fa-book"></i> <span>Data Fakultas</span></a></li>

    <li class="{{ request()->is('data_jurusan') ? 'active' : ''}}"><a href="/data_jurusan"><i class="fa fa-book"></i> <span>Data Jurusan</span></a></li>

    <!-- <li class="{{ request()->is('data_matkul') ? 'active' : ''}}"><a href="/data_matkul"><i class="fa fa-book"></i> <span>Data Mata Kuliah</span></a></li> -->
    
    <li class="{{ request()->is('data_dosen') ? 'active' : ''}}"><a href="/data_dosen"><i class="fa fa-book"></i> <span>Data Dosen</span></a></li>
    
    <li class="{{ request()->is('data_dosenlb') ? 'active' : ''}}"><a href="/data_dosenlb"><i class="fa fa-book"></i> <span>Data Dosen Luar Biasa</span></a></li>
    
    
  </ul>