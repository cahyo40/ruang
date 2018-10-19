	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="{{url('/home/'.csrf_token())}}">
				<img src="{{url('img/undip.png')}}" style="width:25%" alt="">
			</a>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li>
						<a href="{{url('/home/'.csrf_token())}}" class="dropdown-toggle no-arrow">
							<span class="fa fa-home"></span><span class="mtext">Beranda</span>
						</a>
					</li>
                    <li>
						<a href="{{url('/home/'.csrf_token().'/jadwal') }}" class="dropdown-toggle no-arrow">
							<span class="fa fa-calendar-o"></span><span class="mtext">Kelola Jadwal</span>
						</a>
					</li>
                    <li>
						<a href="{{url('/home/'.csrf_token().'/ruang') }}" class="dropdown-toggle no-arrow">
							<span class="fa fa-th"></span><span class="mtext">Kelola Ruang Kelas</span>
						</a>
					</li>
                    <li>
						<a href="{{url('/home/'.csrf_token().'/peminjam') }}" class="dropdown-toggle no-arrow">
							<span class="fa fa-user-o"></span><span class="mtext">Daftar Pengguna</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
