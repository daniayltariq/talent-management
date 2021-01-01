@if (count($comments))
    <table class="table table-hover">
        <thead>
        <tr>
                <th>User</th>
                <th>Comment</th>
                <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($comments as $comm)
            <tr id="post_comm_{{$comm->id}}">
                <td>{{$comm->user->f_name ?? ''}} {{$comm->user->l_name ?? ''}}</td>
                <td>{{$comm->comment ?? ''}}</td>
                <td style="color: #5d78ff" id><a href="#" name="approve_comm" data-commid="{{$comm->id}}">approve</a></td>
            </tr>	
        @endforeach
        
        </tbody>
    </table>
@else
    <h5 style="text-align: center"> No comments</h5>
@endif
