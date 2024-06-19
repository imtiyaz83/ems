<style>
    .header {
        background-color: #f2f2f2; /* Light gray background color */
        padding: 10px; /* Add padding for better spacing */
    }
</style>

<header class="header">
    <nav>
        @if (Session::has('loginId')) <a href="/talk-proposal">Submit a Talk Proposal</a> | <a href="proposal-list">My Proposals</a> | @else <a href="/">Home</a> | <a href="/register">Speaker Registration</a> @endif @if (Session::has('loginId')) <a href="/logout">Logout</a> @else | <a href="/login">Login</a> @endif
    </nav>
</header>

