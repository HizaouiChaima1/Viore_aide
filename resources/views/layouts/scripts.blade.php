<script>
    function loadProductModal(idprod) {
        $.ajax({
            method: 'GET',
            url: '{{ route("load-product-modal", ":idpro") }}'.replace('idpro', idprod),
            success: function(response) {
                $(".load_product_modal_body").html(response); 
                $('#cartModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
</script>

   