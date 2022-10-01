$('#image').on('change', function(e) {
    const file = e.target.files[0];
    const url = URL.createObjectURL(file);
    const img = '<img src="'+ url +'" class="img-fluid uploaded-image" />';
    $('.preview-img').html( img );
});
