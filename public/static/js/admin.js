var base = location.protocol+'//'+location.host;
$(document).ready(function(){
	let btn_deleted = document.getElementsByClassName("btn-deleted");
	let btn_deleted_movie = document.getElementsByClassName("btn-deleted-movie");
	editor_init('editor');
	for(i=0; i < btn_deleted.length; i++)
	{
		btn_deleted[i].addEventListener('click', delete_object);
	}

	
	for(i=0; i < btn_deleted_movie.length; i++)
	{
		btn_deleted_movie[i].addEventListener('click', delete_object_movie);
	}
	let btn_search = document.getElementById('btn_search'); 
	let form_search = document.getElementById('form_search');
	if(btn_search){
		btn_search.addEventListener('click', function(e){
			e.preventDefault();
			if(form_search.style.display === 'block'){
				form_search.style.display = 'none';
			}else{
				form_search.style.display = 'block';
			}
		});
	}
});
function editor_init(field){
	CKEDITOR.replace(field,{
		toolbar: [
		{ name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', '-', 'Undo', 'Redo']  },
		{ name: 'basicstyles', items: ['Bold', 'Italic', 'BulletedList', 'Strike', 'Image', 'Link', 'Unlink', 'Blockquote']  },
		{ name: 'document', items: ['CodeSnippet', 'EmojiPanel', 'Preview', 'Source']  }
		]
	});
}
function delete_object(e)
{
	e.preventDefault();
	var object = this.getAttribute('data-object');
	var url = base + '/users' + '/delete/' + object;
	  Swal.fire({
		title: '¿Estas seguro que quieres eliminar este item?',
		text: "Recuerda que los items eliminados quedaran en la papelera de reciclaje",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, si quiero!',
		cancelButtonText: 'Cancelar'
	  }).then((result) => {
		if (result.value) {
			window.location.href = url;
		}
	  })
	
}
function delete_object_movie(e)
{
	e.preventDefault();
	var object = this.getAttribute('data-object');
	var url = base + '/movies' + '/delete/' + object;
	  Swal.fire({
		title: '¿Estas seguro que quieres eliminar este item?',
		text: "Recuerda que los items eliminados quedaran en la papelera de reciclaje",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, si quiero!',
		cancelButtonText: 'Cancelar'
	  }).then((result) => {
		if (result.value) {
			window.location.href = url;
		}
	  })
	
}