@if ($message = session()->get('message'))
    <div id="messageBox" class="alert alert-success alert-block">
        <button id="clear" type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script>
    var boxButton = $('#clear');

    if(boxButton.val() !== undefined){
        setInterval( () => {
            $('#messageBox').fadeOut();
            {{session()->remove('message')}}
        }, 2000);
    }

    boxButton.click(function () {
        {{session()->remove('message')}}
    });

</script>
