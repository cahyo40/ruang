
	<div class="pre-loader"></div>
	<div class="header clearfix">
		<div class="header-right">
			<div class="brand-logo">
				<a href="{{url('/home/'.csrf_token())}}">
					<img src="{{url('img/undip.png')}}" style="width:60%" alt="" class="mobile-logo">
				</a>
			</div>
			<div class="menu-icon">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon"><i class="fa fa-user-o"></i></span>
						<span class="user-name">{{$nama}} ({{$role}})</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href=""><i class="fa fa-cog" aria-hidden="true"></i> Pengaturan</a>
						<a class="dropdown-item" href="{{route('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i>Keluar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
