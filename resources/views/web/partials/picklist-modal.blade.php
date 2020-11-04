
<div id="picklist-modal" class="modal" data-easein="swoopIn"  tabindex="-1" role="dialog" aria-labelledby="picklist-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" style="cursor: pointer" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h4 class="modal-title">
                    Add to Picklist
                </h4>
            </div>
            
            <form action="{{route('agent.picklist.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <hr>
                    <button type="button" class="btn btn-primary" id="create-picklist-btn">
                        <i class="fa fa-plus"></i> Create new
                    </button>
                    <input type="hidden" name="member_id">
                    @if (count(auth()->user()->picklist) > 0 )
                        <div class="form-group" id="picklist-select">
                            <label for="exampleFormControlSelect1">Select Picklist</label>
                            <select class="form-control" name="picklist_id" id="exampleFormControlSelect1">
                                <option >Select</option>
                                @foreach (auth()->user()->picklist as $picklist)
                                    <option value="{{$picklist->id}}">{{$picklist->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    
                    <div id="new-picklist" class="new-picklist">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Title</label>
                            <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">description</label>
                            <input type="text" class="form-control" name="description" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                        Close
                    </button>
                    <button class="btn btn-primary" type="submit">
                        Save changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>