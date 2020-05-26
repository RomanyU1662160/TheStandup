<table class="table">

    <th>
        <tr>
            <td>
                <h3 class="text-info"> <a href="{{route('member.page', $user->id) }}" class="text-info">
                        {{$user->getFullName()}} </a>
                </h3>
            </td>
            <td> </td>
            <td> </td>
        </tr>
    </th>
    <tr>
        <th> Issues you reported :</th>

        @if(!$user->issues->count())
        <td> {{$user->getFullName()}} has not reported any issues</td>
        @else
        <td>

            @foreach( $user->issues as $issue )
    <tr>
        <td> &#33; {{$issue->title}}</td>

        <td>Last Updated: {{$issue->updated_at->diffForHumans()}}
        </td>
        <td> <span class=" {{$issue->status? 'text-success ' : 'text-warning'}}">
                {{$issue->status? 'Solved' : 'Pending'}} </span>
        </td>
        <td> <a href="{{route('issue.toggle', $issue)}}" class="btn btn-link">
                {{$issue->status? ' Mark as Pending ' : ' Mark as Solved'}}</a>
        </td>
        <td>
            <a href="{{route('issue.delete', $issue)}}" class="btn btn-outline-danger">
                Delete </a>
        </td>
    </tr>

    @endforeach
    @endif
    </td>

    </tr>


</table>
