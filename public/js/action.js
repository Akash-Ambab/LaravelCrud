$('#studentInfo').on('submit', function(e) {
    if(!validate()) {
        e.preventDefault();
    }
})

$('#updateInfo').on('submit', function(e) {
    if(!validate()) {
        e.preventDefault();
    } 
})

function validate() {
    $('#nameError').html('');
    $('#contactError').html('');
    $('#classError').html('');
    $('#courseError').html('');
    
    if($('#name').val() == "") {
        $('#nameError').html('Required');
        return false;
    }

    if($('#contact').val() == "") {
        $('#contactError').html('Required');
        return false;
    }

    if($('#contact').val().length !== 10) {
        $('#contactError').html('Contact should be 10 digit');
        return false;
    }

    if($('#class').val() == "") {
        $('#classError').html('Required');
        return false;
    }

    if($('#course').val() == "") {
        $('#courseError').html('Required');
        return false;
    }

    return true;
}