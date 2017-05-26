<div class="row">

    @foreach($groups as $group)
        <div class="col">

            <div class="list">
                <h6>{{ $group['leader']->name }} 그룹</h6>
                <ul>
                    @foreach($group['members'] as $member)
                        <li>
                            <div class="name">{{$member->name}}</div>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    @endforeach

</div>