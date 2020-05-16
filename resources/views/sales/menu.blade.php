<div class="form-group form-group-compose text-center">
@if ($log_transaksi)
<button type="button"  class="btn btn-danger btn-block my-1" data-toggle="tooltip"
name="open_modal" id="open_modal" data-placement="top" data-original-title="Open Table"><i class="ft-mail"></i> Open Table</button>
@else
<button type="button"  class="btn btn-info btn-block my-1" data-toggle="tooltip"
name="open_period" id="open_period" data-placement="top"><i class="ft-mail"></i> Open Period</button>
@endif
</div>

<h6 class="text-muted text-bold-500 mb-1"> - SALES - </h6>

  <div class="list-group list-group-messages">
    <a href="{{ url('sales') }}" class="list-group-item active border-0">
      <i class="ft-inbox mr-1"></i> Active
      <span class="badge badge-secondary badge-pill float-right">8</span>
    </a>
    <a href="#" class="list-group-item list-group-item-action border-0"><i class="la la-paper-plane-o mr-1"></i> Waiting</a>
    <a href="{{ url('sales/closed') }}" class="list-group-item list-group-item-action border-0"><i class="ft-file mr-1"></i> Closed</a>
    <a href="#" class="list-group-item list-group-item-action border-0"><i class="ft-star mr-1"></i> Take Away<span class="badge badge-danger badge-pill float-right">3</span> </a>
    <a href="#" class="list-group-item list-group-item-action border-0"><i class="ft-trash-2 mr-1"></i> Trash</a>
  </div>

<h6 class="text-muted text-bold-500 mt-1 mb-1">Labels</h6>
  <div class="list-group list-group-messages">
    <a href="#" class="list-group-item list-group-item-action border-0">
      <i class="ft-circle mr-1 warning"></i> Work
      <span class="badge badge-warning badge-pill float-right">5</span>
    </a>
    
    <!--<a href="#" class="list-group-item list-group-item-action border-0"><i class="ft-circle mr-1 danger"></i> Family</a>-->
    <!--<a href="#" class="list-group-item list-group-item-action border-0"><i class="ft-circle mr-1 primary"></i> Friends</a>-->
    <a href="#" class="list-group-item list-group-item-action border-0"><i class="ft-circle mr-1 success"></i> Private <span class="badge badge-success badge-pill float-right">3</span> </a>
  </div>