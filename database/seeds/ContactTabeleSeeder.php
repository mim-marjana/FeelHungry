<?php

use Illuminate\Database\Seeder;

class ContactTabeleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $message = new App\Contact();
      $message->name = "Kawsar Ahmed";
      $message->email = "iamkawsarlive@gmail.com";
      $message->phone = "+01738671782";
      $message->message = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa nostrum repudiandae veniam, totam officiis esse. Dolorum, laboriosam, architecto. Accusantium est distinctio rerum possimus vitae maiores voluptas, quod ex, beatae asperiores.";
      $message->save();

      $message = new App\Contact();
      $message->name = "Adiba Omi";
      $message->email = "omi@gmail.com";
      $message->phone = "+01738671782";
      $message->message = "Reprehenderit cum dolorem officiis delectus, qui autem nobis optio doloribus inventore assumenda nam tempora aliquid soluta veritatis ducimus! Nulla sequi, obcaecati fugiat quis aspernatur ipsum impedit possimus est. Error similique voluptates aperiam ratione fugit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa nostrum repudiandae veniam, totam officiis esse. Dolorum, laboriosam, architecto. Accusantium est distinctio rerum possimus vitae maiores voluptas, quod ex, beatae asperiores.";
      $message->save();

      $message = new App\Contact();
      $message->name = "Aditya Ovi";
      $message->email = "ovi@gmail.com";
      $message->phone = "+01738671782";
      $message->message = "Totam officiis esse. Dolorum, laboriosam, architecto. Accusantium est distinctio rerum possimus vitae maiores voluptas, quod ex, beatae asperiores. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus accusantium impedit excepturi error vero! Et minus reprehenderit cum dolorem officiis delectus, qui autem nobis optio doloribus inventore assumenda nam tempora aliquid soluta veritatis ducimus! Nulla sequi, obcaecati fugiat quis aspernatur ipsum impedit possimus est. Error similique voluptates aperiam ratione fugit.";
      $message->save();


      $message = new App\Contact();
      $message->name = "Amin Raihan";
      $message->email = "amin@gmail.com";
      $message->phone = "+01738671782";
      $message->message = "Ipsa nostrum repudiandae veniam, totam officiis esse. Dolorum, laboriosam, architecto. Accusantium est distinctio rerum possimus vitae maiores voluptas, quod ex, beatae asperiores. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus accusantium impedit excepturi error vero! Et minus reprehenderit cum dolorem officiis delectus, qui autem nobis optio doloribus inventore assumenda nam tempora aliquid soluta veritatis ducimus! Nulla sequi, obcaecati fugiat quis aspernatur ipsum impedit possimus est. Error similique voluptates aperiam ratione fugit.";
      $message->save();



      $message = new App\Contact();
      $message->name = "Shahriar Ahmed";
      $message->email = "shahriar@gmail.com";
      $message->phone = "+01738671782";
      $message->message = "Accusantium impedit excepturi error vero! Et minus reprehenderit cum dolorem officiis delectus, qui autem nobis optio. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa nostrum repudiandae veniam, totam officiis esse. Dolorum, laboriosam, architecto. Accusantium est distinctio rerum possimus vitae maiores voluptas, quod ex, beatae asperiores.";
      $message->save();


      $message = new App\Contact();
      $message->name = "Mahbub Abedin";
      $message->email = "mahbub@gmail.com";
      $message->phone = "+01738671782";
      $message->message = "Distinctio rerum possimus vitae maiores voluptas, quod ex, beatae asperiores. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa nostrum repudiandae veniam, totam officiis esse. Dolorum, laboriosam, architecto. Accusantium est distinctio rerum possimus vitae maiores voluptas, quod ex, beatae asperiores. Distinctio rerum possimus vitae maiores voluptas, quod ex, beatae asperiores. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa nostrum repudiandae veniam, totam officiis esse. Dolorum, laboriosam, architecto. Accusantium est distinctio rerum possimus vitae maiores voluptas, quod ex, beatae asperiores.";
      $message->save();


      $message = new App\Contact();
      $message->name = "Mahdi Hasan";
      $message->email = "mahdi@gmail.com";
      $message->phone = "+01738671782";
      $message->message = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa nostrum repudiandae veniam, totam officiis esse. Dolorum, laboriosam, architecto. Accusantium est distinctio rerum possimus vitae maiores voluptas, quod ex, beatae asperiores. Distinctio rerum possimus vitae maiores voluptas, quod ex, beatae asperiores. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa nostrum repudiandae veniam, totam officiis esse. Dolorum, laboriosam, architecto. Accusantium est distinctio rerum possimus vitae maiores voluptas, quod ex, beatae asperiores. Distinctio rerum possimus vitae maiores voluptas, quod ex, beatae asperiores. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa nostrum repudiandae veniam, totam officiis esse. Dolorum, laboriosam, architecto. Accusantium est distinctio rerum possimus vitae maiores voluptas, quod ex, beatae asperiores. Distinctio rerum possimus vitae maiores voluptas, quod ex, beatae asperiores. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa nostrum repudiandae veniam, totam officiis esse. Dolorum, laboriosam, architecto. Accusantium est distinctio rerum possimus vitae maiores voluptas, quod ex, beatae asperiores. Distinctio rerum possimus vitae maiores voluptas, quod ex, beatae asperiores. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa nostrum repudiandae veniam, totam officiis esse. Dolorum, laboriosam, architecto. Accusantium est distinctio rerum possimus vitae maiores voluptas, quod ex, beatae asperiores.";
      $message->save();
 	}
}
