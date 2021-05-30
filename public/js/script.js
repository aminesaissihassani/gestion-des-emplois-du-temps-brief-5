function editGroups(id)
{
    // Hiding the Show elements
    document.getElementById('name-' + id).style.display = 'none';
    document.getElementById('number-' + id).style.display = 'none';
    document.getElementById('edit-button-' + id).style.display = 'none';
    document.getElementById('delete-button-' + id).style.display = 'none';

    // Showing the Edit elements
    document.getElementById('edit-name-' + id).style.display = 'table-cell';
    document.getElementById('edit-number-' + id).style.display = 'table-cell';
    document.getElementById('update-button-' + id).style.display = 'inline-block';
    document.getElementById('cancel-button-' + id).style.display = 'inline-block';

    // Form
    document.getElementById('edit-name-' + id).querySelector('input').setAttribute('form', 'edit-form');
    document.getElementById('edit-number-' + id).querySelector('input').setAttribute('form', 'edit-form');
    document.getElementById('edit-id-' + id).querySelector('input').setAttribute('form', 'edit-form');
    document.getElementById('update-button-' + id).setAttribute('form', 'edit-form');
}

function cancelEditGroups(id)
{
    // Hiding the Edit elements
    document.getElementById('edit-name-' + id).style.display = 'none';
    document.getElementById('edit-number-' + id).style.display = 'none';
    document.getElementById('update-button-' + id).style.display = 'none';
    document.getElementById('cancel-button-' + id).style.display = 'none';

    // Showing the Show elements
    document.getElementById('name-' + id).style.display = 'table-cell';
    document.getElementById('number-' + id).style.display = 'table-cell';
    document.getElementById('edit-button-' + id).style.display = 'inline-block';
    document.getElementById('delete-button-' + id).style.display = 'inline-block';
}

function editRooms(id)
{
    // Hiding the Show elements
    document.getElementById('name-' + id).style.display = 'none';
    document.getElementById('edit-button-' + id).style.display = 'none';
    document.getElementById('delete-button-' + id).style.display = 'none';

    // Showing the Edit elements
    document.getElementById('edit-name-' + id).style.display = 'table-cell';
    document.getElementById('update-button-' + id).style.display = 'inline-block';
    document.getElementById('cancel-button-' + id).style.display = 'inline-block';

    // Form
    document.getElementById('edit-name-' + id).querySelector('input').setAttribute('form', 'edit-form');
    document.getElementById('edit-id-' + id).querySelector('input').setAttribute('form', 'edit-form');
    document.getElementById('update-button-' + id).setAttribute('form', 'edit-form');
}

function cancelEditRooms(id)
{
    // Hiding the Edit elements
    document.getElementById('edit-name-' + id).style.display = 'none';
    document.getElementById('update-button-' + id).style.display = 'none';
    document.getElementById('cancel-button-' + id).style.display = 'none';

    // Showing the Show elements
    document.getElementById('name-' + id).style.display = 'table-cell';
    document.getElementById('edit-button-' + id).style.display = 'inline-block';
    document.getElementById('delete-button-' + id).style.display = 'inline-block';
}

function editSubjects(id)
{
    // Hiding the Show elements
    document.getElementById('name-' + id).style.display = 'none';
    document.getElementById('edit-button-' + id).style.display = 'none';
    document.getElementById('delete-button-' + id).style.display = 'none';

    // Showing the Edit elements
    document.getElementById('edit-name-' + id).style.display = 'table-cell';
    document.getElementById('update-button-' + id).style.display = 'inline-block';
    document.getElementById('cancel-button-' + id).style.display = 'inline-block';

    // Form
    document.getElementById('edit-name-' + id).querySelector('input').setAttribute('form', 'edit-form');
    document.getElementById('edit-id-' + id).querySelector('input').setAttribute('form', 'edit-form');
    document.getElementById('update-button-' + id).setAttribute('form', 'edit-form');
}

function cancelEditSubjects(id)
{
    // Hiding the Edit elements
    document.getElementById('edit-name-' + id).style.display = 'none';
    document.getElementById('update-button-' + id).style.display = 'none';
    document.getElementById('cancel-button-' + id).style.display = 'none';

    // Showing the Show elements
    document.getElementById('name-' + id).style.display = 'table-cell';
    document.getElementById('edit-button-' + id).style.display = 'inline-block';
    document.getElementById('delete-button-' + id).style.display = 'inline-block';
}