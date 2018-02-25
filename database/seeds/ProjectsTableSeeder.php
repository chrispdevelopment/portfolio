<?php

use Portfolio\Entities\Project;

class ProjectsTableSeeder extends BaseSeeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $this->truncate('projects');

        /** @var Project $project */
        $project = Project::create([
            'language_id' => 1,
            'project_id' => 'IGMS',
            'name' => 'Imbalance Gaming Management System',
            'description' => '<p>This site was created for my final year project at uni and involved me creating a web based application of my choosing. This lead me to create an application that would allow developers to easily deploy projects to both live and development environments and have all necessary tasks run on the server for those projects to work.</p> <p>To achieve this the project used Angular 2 and TypeScript for the frontend with an API using the PHP framework Laravel on the backend to process data requests and manage deployments. This separation of concern would allow for other deployment platforms such as Java or ASP to be developed in the future by just developing a new API for the frontend to connect to.</p> <p>The API code can be found here and the frontend code can be found from the git link below</p>',
            'git_link' => 'https://github.com/ImbalanceGaming/imbalance-gaming-management-interface-angular-2',
            'site_link' => null
        ]);

        for ($x = 1; $x <= 4; $x++) {
            $project->projectImages()->create([
                'image_path' => "\\Web\\".$project->project_id.'_'.$x
            ]);
        }

        $project = Project::create([
            'language_id' => 1,
            'project_id' => 'FP',
            'name' => 'Front Page',
            'description' => '<p>This site was created for my uni server side development module where we where tasked with creating a web site that could display data from different tables in a database. This site also needed to allow for login and restrict updating and deletion of table entry\'s to logged in user\'s. It was also required that these features be implemented in both PHP and ASP.Net.</p> <p>I enjoyed this assignment as it gave me a chance to show of my PHP skills when developing in OOP style and it gave me a chance to try out developing in ASP.Net as that is something I haven\'t tried before.</p> <p>Unfortunately there is currently no page link for this site due to incompatibility between my host and the framework.</p>',
            'git_link' => 'https://github.com/chrispdevelopment/Front-Page',
            'site_link' => null
        ]);

        for ($x = 1; $x <= 5; $x++) {
            $project->projectImages()->create([
                'image_path' => "\\Web\\".$project->project_id.'_'.$x
            ]);
        }

        $project = Project::create([
            'language_id' => 1,
            'project_id' => 'Plym',
            'name' => 'Plymotion',
            'description' => '<p>This site was created for my integrate project module in my second year of uni. This module involved creating a web site for a client that we picked out at the start of the module.</p> <p>The client for this module wanted a web site that would allow him to manage a cycling scheme that he ran for Plymouth council.</p> <p>To achieve this the PHP framework Codeigniter was used as this allowed for a solid base to the application with which to build on.</p>',
            'git_link' => 'https://github.com/chrispdevelopment/Plymotion',
            'site_link' => null
        ]);

        for ($x = 1; $x <= 4; $x++) {
            $project->projectImages()->create([
                'image_path' => "\\Web\\".$project->project_id.'_'.$x
            ]);
        }

        $project = Project::create([
            'language_id' => 1,
            'project_id' => 'GM',
            'name' => 'Grade Me',
            'description' => '<p>During my time at college I created this web site as an answer to my second year project. At the time the way college dealt with recording grades was via excel document and I decided I could move this into an electronic environment.</p> <p>Unfortunately I was unable to fully realize this web site due to time constraints but I did manage to get a large chunk of the data structure and database calls in place.</p>',
            'git_link' => 'https://github.com/chrispdevelopment/Grade-Me',
            'site_link' => null
        ]);

        for ($x = 1; $x <= 4; $x++) {
            $project->projectImages()->create([
                'image_path' => "\\Web\\".$project->project_id.'_'.$x
            ]);
        }

        $project = Project::create([
            'language_id' => 1,
            'project_id' => 'VR',
            'name' => 'Vanguard Research',
            'description' => '<p>This was the first site I made with a dynamic database driven back end and Ajax to load in the data. I also used the data from the database to generate the tree menu in the third picture.</p> <p>This site was my first major step into the world of dynamic web sites and even though it is no longer used I still feel proud of this site and some of the code I learned along the way.</p>',
            'git_link' => null,
            'site_link' => null
        ]);

        for ($x = 1; $x <= 3; $x++) {
            $project->projectImages()->create([
                'image_path' => "\\Web\\".$project->project_id.'_'.$x
            ]);
        }

        $project = Project::create([
            'language_id' => 2,
            'project_id' => 'Cat',
            'name' => 'Catan',
            'description' => '<p>This site was created for my final year module client-side web scripting. This involved creating a game using JavaScript, HTML5 Canvas and Node that was interactive, distributed and well structured.</p> <p>To achieve these goals I decided to use TypeScript which is a typed superset of JavaScript and allowed me to more effectively implement an OOP structure into the application.</p> <p>This was a fun project as I hadn\'t used ever TypeScript or Node before and my experiences with TypeScript has lead me to want to use it for all my web projects. The git link for this site takes you to the client code for the project but the server code can also be found at the link below</p> <a id="link" href="https://github.com/ImbalanceGaming/Catan-Server">Server Code</a>',
            'git_link' => 'https://github.com/ImbalanceGaming/Catan-Client',
            'site_link' => null
        ]);

        for ($x = 1; $x <= 4; $x++) {
            $project->projectImages()->create([
                'image_path' => "\\Web\\".$project->project_id.'_'.$x
            ]);
        }

        $project = Project::create([
            'language_id' => 2,
            'project_id' => 'SH',
            'name' => 'Slouching Hound',
            'description' => '<p>I created this web site for a University assignment that required me to take an already existing web site and improve upon it. I decided to choice a web site called slouching hound that can be found here. It had many design flaws and as such was a perfect candidate for this assignment.</p> <p>I recreated the site with a much nicer layout and I used auto generation of code in the backend using JavaScript to make administration of the site much easier.</p>',
            'git_link' => 'https://github.com/chrispdevelopment/Slouching-Hound',
            'site_link' => null
        ]);

        for ($x = 1; $x <= 4; $x++) {
            $project->projectImages()->create([
                'image_path' => "\\Web\\".$project->project_id.'_'.$x
            ]);
        }

        $project = Project::create([
            'language_id' => 2,
            'project_id' => 'SI',
            'name' => 'Space Invaders',
            'description' => '<p>This was a small game I created using HTML5 canvas and CreateJS for a university project that required me to ever make a game using HTML5 or Flash.</p> <p>I decided to go with the HTML5 option as it wasn\'t something I had done before and as such made a nice challenge.</p>',
            'git_link' => null,
            'site_link' => null
        ]);

        for ($x = 1; $x <= 3; $x++) {
            $project->projectImages()->create([
                'image_path' => "\\Web\\".$project->project_id.'_'.$x
            ]);
        }

        $project = Project::create([
            'language_id' => 3,
            'project_id' => 'Sin',
            'name' => 'Sintac',
            'description' => '<p>This was a small site I did for a local IT business. It is a very simple site but i really liked how the design came out.</p>',
            'git_link' => null,
            'site_link' => null
        ]);

        for ($x = 1; $x <= 3; $x++) {
            $project->projectImages()->create([
                'image_path' => "\\Web\\".$project->project_id.'_'.$x
            ]);
        }

        $project = Project::create([
            'language_id' => 4,
            'project_id' => 'FL',
            'name' => 'Football Leagues',
            'description' => '<p>This C# program was an assignment for my C# unit at university and required that we use array lists to pull data from text files and display to the user with a user friendly interface.</p> <p>I found this a very fun program to create as I love C# and I leavened some new techniques along the way to do with sorting array lists and setting up link lists.</p>',
            'git_link' => 'https://github.com/chrispdevelopment/Football-Leagues',
            'site_link' => null
        ]);

        for ($x = 1; $x <= 4; $x++) {
            $project->projectImages()->create([
                'image_path' => "\\C-Sharp\\".$project->project_id.'_'.$x
            ]);
        }

        $project = Project::create([
            'language_id' => 4,
            'project_id' => 'SM',
            'name' => 'Slot Machine',
            'description' => '<p>This was a small slot machine game that I create for the final year in college. It was my first try at making a simple game using C# and I think it came out very well.</p>',
            'git_link' => 'https://github.com/chrispdevelopment/Slot-Machine',
            'site_link' => null
        ]);

        for ($x = 1; $x <= 3; $x++) {
            $project->projectImages()->create([
                'image_path' => "\\C-Sharp\\".$project->project_id.'_'.$x
            ]);
        }

        $project = Project::create([
            'language_id' => 5,
            'project_id' => 'LT',
            'name' => 'Leavers Tool',
            'description' => '<p> This is an application I created to help with account management when I was working the helpdesk and Devon & Cornwall Probation Service. This helped to vastly speed up the process of removing staff who has left from the system.</p> <p>It pulls all AD records from the system and then allows the admin to delete the users files and then his AD record. I also added setup options so this program could be configured to work other networks.</p>',
            'git_link' => 'https://github.com/chrispdevelopment/Leavers-Tool',
            'site_link' => null
        ]);

        for ($x = 1; $x <= 4; $x++) {
            $project->projectImages()->create([
                'image_path' => "\\VB\\".$project->project_id.'_'.$x
            ]);
        }

        $project = Project::create([
            'language_id' => 5,
            'project_id' => 'RC',
            'name' => 'Router Checks',
            'description' => '<p> This was another program I created for the Probation Service helpdesk. It allows for all routers on the network to be monitored. This decreased the response time for fixing routers when they went down.</p> <p>This program had a MS Access database back end and allowed the user to pull up information on the routers so that technicians could be easily sent out to repair them.</p>',
            'git_link' => 'https://github.com/chrispdevelopment/Router-Check',
            'site_link' => null
        ]);

        for ($x = 1; $x <= 5; $x++) {
            $project->projectImages()->create([
                'image_path' => "\\VB\\".$project->project_id.'_'.$x
            ]);
        }

        $project = Project::create([
            'language_id' => 6,
            'project_id' => 'MM',
            'name' => 'Music Mania',
            'description' => '<p>This JSP application was created for my second year module in Java Development for the web. This assignment required a web site to be produced that would allow users to keep themselves updated on the latest music news as well as find out information about events that are going on and be able to buy merchandise for different artists and bands.</p> <p>This was a fun development process as JSP sites was not something I had done before and on top of that I had decided to implement my own MVC architecture so this added to the challenge.</p>',
            'git_link' => 'https://github.com/chrispdevelopment/MusicMania',
            'site_link' => null
        ]);

        for ($x = 1; $x <= 8; $x++) {
            $project->projectImages()->create([
                'image_path' => "\\Java\\".$project->project_id.'_'.$x
            ]);
        }

        $project = Project::create([
            'language_id' => 6,
            'project_id' => 'BS',
            'name' => 'Book Shop',
            'description' => '<p> This was my first Java creation that I did for the first year of my Java module at uni. It was required that we create and application that would allow admin staff to manage stock of paper and electronic books for a book store and have an order system integrated as well.</p> <p>I had a fun time creating this application as we needed to create it in an OOP style but I also decided to use XML to store the data for the program. This defiantly pushed me and I ended up learning allot from its creation.</p>',
            'git_link' => 'https://github.com/chrispdevelopment/BookShop',
            'site_link' => null
        ]);

        for ($x = 1; $x <= 5; $x++) {
            $project->projectImages()->create([
                'image_path' => "\\Java\\".$project->project_id.'_'.$x
            ]);
        }

        $project = Project::create([
            'language_id' => 7,
            'project_id' => 'OW',
            'name' => 'Open World',
            'description' => '<p>This C++ application is a game created for my programming for entertainment uni module. This module had me create a game using DirectX and I choice to create an open world game so that I could look at landscape generation.</p> <p>This was an interesting task as I had never used DirectX before and getting the application to generate terrain and allow a small vehicle to move around in it was defiantly a challenge.</p>',
            'git_link' => 'https://github.com/chrispdevelopment/Open-World',
            'site_link' => null
        ]);

        for ($x = 1; $x <= 3; $x++) {
            $project->projectImages()->create([
                'image_path' => "\\C++\\".$project->project_id.'_'.$x
            ]);
        }

        $project = Project::create([
            'language_id' => 8,
            'project_id' => 'ADP',
            'name' => 'APEX Database Project',
            'description' => '<p>This was an assignment set at uni to create a Oracle database and use APEX to create the frontend for the database. It was required that there be admin sections for management with a section to show reports and a separate user section.</p> <p>This assignment was definatly a challenge as APEX can be a bit tricky to work with but I feel that the finished result was very impressive. Unfortunately as this was stored on the uni Oracle server I am unable to provide anything but pictures</p>',
            'git_link' => null,
            'site_link' => null
        ]);

        for ($x = 1; $x <= 5; $x++) {
            $project->projectImages()->create([
                'image_path' => "\\Apex\\".$project->project_id.'_'.$x
            ]);
        }

    }

}
