function getAjaxHeaders() {
    return {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
}