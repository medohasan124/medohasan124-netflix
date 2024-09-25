@props([
    'searchplaceholder' => 'Search',
    'btnCreate' => false,
    'btnBulkCDelete' => false,
    'bthCreateHref' => '#',
    'url'=>'',
    'data' => [],
    ])
<div class="overflow-x-auto relative shadow-md sm:rounded-lg">

    <div class='flex items-center'>

    <div class="pb-4 bg-white dark:bg-gray-900 mx-5 pt-2.5">
        <label for="table-search" class="sr-only">Search</label>


        <div class="relative mt-1">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <input type="text" id="myInputTextField"

                class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="{{ $searchplaceholder }}">

        </div>
    </div>

    @if ($btnCreate)
    <x-buttons.create :name="__('admin.create')"  :href='$bthCreateHref' />
    @endif

    @if ($btnBulkCDelete)

    <x-modal.bulckdelete class='text-white bg-red-500 dark:bg-red-900 cursor-not-allowed' />

    @endif

    </div>


    <table id='myTable' class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        {{ $slot }}
    </table>

</div>


<script>
    $(document).ready(function() {

        var jsonData = {!! json_encode($data) !!};
        oTable =   $('#myTable').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: "{{ $url }}"
            },

            columns: jsonData,

        });

        $('.dt-layout-cell').addClass('px-5 text-grey-900 dark:text-white');
        $('#myInputTextField').keyup(function(){
            oTable.search($(this).val()).draw() ;
        });

        $('.dt-search').remove();


        $(document).on('change', '.all-checkbox', function() {
            $('.record_select').prop('checked', this.checked);
            getRecordSelect();
        });

        $(document).on('change', '.record_select', function() {
            var allChecked = $('.record_select:checked').length === $('.record_select').length;
            $('.all-checkbox').prop('checked', allChecked);
            getRecordSelect();
        });

        function getRecordSelect() {

            if ($('.record_select:checked').length >= 2) {
                console.log('yes');
                $('.bulckDelete').removeAttr('disabled');
                $('.bulckDelete').removeClass('dark:bg-red-900 cursor-not-allowed');
            } else {
                $('.bulckDelete').attr('disabled', 'disabled');
                $('.bulckDelete').addClass('dark:bg-red-900 cursor-not-allowed');
            }

        }

        $('.bulckDeleteEnd').on('click', function() {

            var recordsId = [];
            $.each($('.record_select:checked'), function() {
                recordsId.push($(this).val());
            });

            $('.buclkDeleteInput').val(recordsId);


        })
    });

    </script>
