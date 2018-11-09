<div class="modal fade" id={{$id.'Modal'}} tabindex="-1" role="dialog" aria-labelledby={{$id.'ModalLabel'}} aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id={{$id.'ModalLabel'}}>{{$slot}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/home/password/add" class="add-elem" method="post">
      <div class="modal-body">
            @csrf
            <input type="hidden" value={{$id}}>
            <input type="text"  placeholder="Name" value="{{$name}}">
            <input type="password" placeholder="Password" value="{{$password}}">
            <input type="text"  placeholder="Username" value="{{$username}}">
            <input type="text"  placeholder="Url" value="{{$url}}">
            <input type="textarea"  placeholder="Comment" value={{$comment}}>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary tessst">Update</button>
      </div>
    </form>
    </div>
  </div>
</div>
