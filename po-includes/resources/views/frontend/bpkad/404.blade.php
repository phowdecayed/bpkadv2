@extends(getTheme('layouts.app'))

@section('content')
	<section id="main-container" class="main-container">
		<div class="container">
			<div class="row">
				<div class="error-page text-center">
					<div class="error-code">
						<h2><strong>404</strong></h2>
					</div>
					<div class="error-message">
						<h3>Oops... Halaman Tidak Ditemukan!</h3>
					</div>
					<div class="error-body">
						Gunakan Tombol Dibawah Untuk Kembali ke Halaman Utama<br>
						<a href="{{ url('/') }}" class="button">Home</a>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
