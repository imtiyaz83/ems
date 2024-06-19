<?php
use App\Http\Controllers\TalkProposalController;

Route::get('/talk-proposals', [TalkProposalController::class, 'index']);
