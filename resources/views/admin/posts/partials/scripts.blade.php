<script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
<script>
	$(document).ready(function() {
		$('#name').stringToSlug({
			setEvents: 'keyup keydown blur',
			getPut: '#slug',
			space: '-'
		});
	});

	ClassicEditor
		.create(document.querySelector('#extract'))
		.catch(error => {
			console.error(error);
		});
	ClassicEditor
		.create(document.querySelector('#body'))
		.catch(error => {
			console.error(error);
		});

	document.getElementById('file').onchange = function(e) {
		if (e.target.files[0]) {
			let reader = new FileReader();
			reader.readAsDataURL(e.target.files[0]);
			reader.onload = (event) => {
				document.getElementById('picture').setAttribute('src', event.target.result);
			};
		} else {
			document.getElementById('picture').setAttribute('src', 'https://cdn.pixabay.com/photo/2021/12/19/12/27/road-6881040_960_720.jpg');
		}
	}
</script>