<x-layout.app>
    <div class="login">
            
        <div class="container" style="width: 1100px; text-align:center;">
            <h1>Your Proposals</h1>

            <div style="text-align:right;padding-top:50px;"><a href="/talk-proposal" class="btn btn-primary mb-3">Submit a New Proposal</a></div>

                @if ($proposals->isEmpty())
                    <p>You have not submitted any proposals yet.</p>
                @else
                    <table class="table table-bordered" align="center">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Abstract</th>
                                <th>Preferred Time Slot</th>
                                <th>Submitted At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proposals as $proposal)
                                <tr>
                                    <td>{{ $proposal->title }}</td>
                                    <td>{{ $proposal->abstract }}</td>
                                    <td>{{ $proposal->preferred_time_slot }}</td>
                                    <td>{{ $proposal->created_at->format('Y-m-d H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
                    
        </div>

    </div>
</x-layout.app>
