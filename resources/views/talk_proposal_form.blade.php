<x-layout.app>
<div class="login">
        
            <div class="login__content">
        
                <div class="login__forms">

                    <form action="{{ route('talkProposals.store') }}" class="login__create" id="" method="POST">
                     @csrf
                        <h1 class="login__title">Submit a Proposal</h1>
    
                        <div class="login__box">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" placeholder="Title" class="login__input" id="title" name="title" value="{{ old('title') }}" >
                        </div>
    
                        <div class="login__box">
                            <i class='bx bx-at login__icon'></i>
                            <textarea class="form-control" placeholder="Abstract" id="abstract" name="abstract" >{{ old('abstract') }}</textarea>
                        </div>

                        <div class="login__box">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" placeholder="Preferred Time Slot" class="login__input" id="preferred_time_slot" name="preferred_time_slot" value="{{ old('preferred_time_slot') }}" >
                        </div>

                        <button type="submit" class="login__button">Submit Your Proposal</button>
                        
                    </form>
                </div>
            </div>
            </x-layout.app>