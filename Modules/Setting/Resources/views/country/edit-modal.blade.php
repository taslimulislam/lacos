<!-- Edit Country Modal -->
<div class="modal fade" id="editCountryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content edit-country-modal" >
                                    
                    
        
        </div>
    </div>
</div>


@push('js')
    <script>
        $('.edit-country').click(function (e){
            e.preventDefault();
            var country_id = $(this).val();
            $.get('countries/' +country_id + '/edit', function (data) {
                $('#editCountryModal').find('.edit-country-modal').first().html(data);
                $('#editCountryModal').modal('show');
            });

        });
    </script>
@endpush