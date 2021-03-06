
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
                @if($errors->any())
                <div class="row">
                    <div class="col-md-12">
                        @foreach ($errors->all() as $error)
                            @if($errors->has('member_id')||$errors->has('title')||$errors->has('description'))
                                <div class="error">{{ $error }}</div>
                            @endif
                        @endforeach
                        
                    </div>
                </div>
                @endif
            </div>
            @php
                $route="#";
                if (\Auth::check() && auth()->user()->hasRole('superadmin')) {
                    $route=route('backend.picklist.store');
                } 
                elseif(\Auth::check() && auth()->user()->hasRole('agent')) {
                    $route=route('agent.picklist.store');
                }
                
            @endphp
            
            <form action="{{$route}}" method="POST">
                @csrf
                <div class="modal-body">
                    <hr>
                    <button type="button" class="btn btn-primary" id="create-picklist-btn">
                        <i class="fa fa-plus"></i> Create new
                    </button>
                    <input type="hidden" name="member_id" value="{{old('member_id')}}">
                    @if (count(auth()->user()->picklist) > 0 )
                        <div class="form-group" id="picklist-select">
                            <label for="exampleFormControlSelect1">Select Picklist</label>
                            <select class="form-control" name="picklist_id" required="required" id="exampleFormControlSelect1">
                                <option value="" disabled selected>Select</option>
                                @foreach (auth()->user()->picklist as $picklist)
                                    <option value="{{$picklist->id}}">{{$picklist->title}}</option>
                                @endforeach
                            </select>
                            {{-- @error('member_id')
                                <div class="error">Talent already exists</div>
                            @enderror --}}
                        </div>
                    @endif
                    
                    <div id="new-picklist" class="new-picklist">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Title</label>
                            <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Enter Title">
                            {{-- @error('title')
                                <div class="error">{{ $message }}</div>
                            @enderror --}}
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Description</label>
                            <input type="text" class="form-control" name="description" id="exampleFormControlInput1" placeholder="Enter Description">
                            {{-- @error('description')
                                <div class="error">{{ $message }}</div>
                            @enderror --}}
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