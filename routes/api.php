<?php
use App\Http\Controllers\TalkProposalController;

Route::get('/proposals/{speaker_id}', [TalkProposalController::class, 'listProposals'])->name('proposals.list');

