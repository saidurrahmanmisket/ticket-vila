<?php

namespace App\Services;

class CampaignService
{
    public function checkCampaignAndTickets($campaign, $quantity): true|\Illuminate\Http\RedirectResponse
    {
        if (empty($campaign)) {
            flash()->addWarning('Campaign not found.');

            return redirect()->back();
        }

        $soldTicket = $campaign->tickets()->count();
        $ticketRemain = $campaign->limit - $soldTicket;

        if ($ticketRemain < $quantity) {
            if ($ticketRemain <= 0) {
                $ticketRemain = '0';
            }
            flash()->addWarning('Only '.$ticketRemain.' Tickets Are Available');

            return redirect()->route('frontend.web-shop.checkout');
        }

        return true;
    }
}
