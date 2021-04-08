<?php

use Illuminate\Database\Seeder;

class FaqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faq = new App\Faq();
        $faq->question = "My order is late";
        $faq->answer = "Try as we do to get your food to you on time, some things are sadly out of our control, meaning that delivery orders can occasionally be delayed.
			The ETA can sometimes change but if the restaurant needs to extend the delivery time, hungryhouse will send you a notification.";
			$faq->save();


			$faq = new App\Faq();
        $faq->question = "My order is cancelled";
        $faq->answer = "If an order is unsuccessful or cancelled by the restaurant we will send you an SMS, push or email notification of the cancellation that outlines the next steps.";
			$faq->save();


			$faq = new App\Faq();
        $faq->question = "I didn't enjoy my food";
        $faq->answer = "We understand that sometimes food does not arrive as expected and you may not be happy with what you received.
		
				It is best to speak to the restaurant directly to discuss the issues with the order and request a replacement or compensation, but we are always more than happy to facilitate that conversation.";
			$faq->save();

			$faq = new App\Faq();
        $faq->question = "My food never arrived";
        $faq->answer = "In the unlikely event your food does not arrive at all, we'll speak to the restaurant to work out what happened and confirm the cancellation & refund of the order itself.";
			$faq->save();


			$faq = new App\Faq();
        $faq->question = "My order was incorrect";
        $faq->answer = "Get in touch with us and let us know what was incorrect. We can liaise with restaurant to find a solution.

If you would prefer a refund, we will request this from the restaurant. From there, our refund process is the same as usual";
			$faq->save();

    }
}
