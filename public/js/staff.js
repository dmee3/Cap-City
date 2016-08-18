var vm = new Vue({
  el: '#staff',
  data: {
    staff: [
      {
        name: 'Dan Meehan',
        position: 'Executive Director / Front Ensemble Technician',
        image: 'img/staff/dan.jpg',
        area: ['admin', 'front'],
        bio: 'Dan has been involved in WGI since 2011, when he played drumset as a founding member of Notre Dame Indoor Percussion Ensemble. He began performing with Capital City Percussion in the front ensemble during the 2013 season and stayed until he aged out in 2015.<br><br>Outside of WGI, Dan is working towards a master\'s degree in Computer Science Engineering at The Ohio State University. He also works with various high school percussion programs in Northeast Ohio.<br><br>Dan is stoked to be returning to Cap City\'s staff for 2017!'
      },
      {
        name: 'Donnie Ross',
        position: 'Program Coordinator / Front Ensemble Arranger',
        image: 'img/staff/donnie.jpg',
        area: ['design', 'front'],
        bio: 'Donnie has proudly been involved with Cap City since its inaugural 2012 season, and currently serves as the director and front ensemble arranger. His experience includes being a past member of the Glassmen Drum and Bugle Corps (07-09) and Matrix Percussion (06-10). He returned to be on staff for both organizations - Glassmen in 2012, and Matrix 2012-2013.<br><br>Ross is an active marching percussion educator and arranger, and has performed as a clinician across the mid-west and Europe. Highlights include performing at the 2007 PAS Convention and 2008 IPE Championships in Europe. Ross also serves as the Educational Sales Director for Columbus Percussion.<br><br>"2017 will be a special year for Cap City, and I can\'t wait for this year\'s members to share it with all our fans!"'
      },
      {
        name: 'Aaron Vranekovic',
        position: 'Assistant Director / Front Ensemble Technician',
        image: 'img/staff/aaron.jpg',
        area: ['admin', 'front'],
        bio: 'Aaron Vranekovic has been involved with the marching arts activity since 2003. He is a WGI finalist with Matrix Percussion from 2007 and 2008.  Aaron graduated from high school Amherst Steele in Northeast Ohio in 2007 where he served as Percussion Director for their indoor and outdoor programs for nine years.  Through seven total years with the indoor program, Aaron has taken the Scholastic A group to Semi-Finals at WGI World Championships.<br><br>Outside the marching activity, Aaron enjoys going to sporting events in Cleveland and Columbus with friends.  He holds a BA in Mechanical Engineering from The Ohio State University.  Aaron is currently an applications engineer with Briskheat Corporation in Columbus.<br><br>This will be Aaron\'s first season with Cap City.'
      },
      {
        name: 'Dean Hickman',
        position: 'Battery Arranger / Quad Technician',
        image: 'img/staff/dean.jpg',
        area: ['design', 'battery'],
        bio: 'Dean grew up in Columbus, Ohio. He has been teaching drumlines and private lessons around the Columbus area for the past 8 years. His drum corps experience began with the Glassmen in 2007, moving on to march with Carolina Crown in 2008. He then marched with the Blue Devils during their 2009 and 2010 undefeated seasons, earning two DCI World Championships and a Fred Sanford High Percussion award. After aging out, he made a quick transition from student to teacher, as a member of the percussion staff for The Cadets in 2011. Dean returned to Carolina Crown as a part of the 2012 instructional staff.<br><br>Dean is also very active in the WGI community. He marched with the 3-time WGI gold-medalist Independent World group Rhythm X from 2009-2011. Dean has been the battery coordinator at Capital City Percussion since their inaugural season in 2012 and took the position as assistant director in 2013. Dean currently lives with his wife in Hilliard, OH and is excited for the future of Capital City Percussion.'
      },
      {
        name: 'Mike Wells',
        position: 'Visual Designer',
        image: 'img/staff/mike.jpg',
        area: ['design'],
        bio: 'Mike Wells currently resides in Canton, MI where he serves as a full time Visual Designer for the Marching Arts. As a performer, Mike started his marching career with the Glassmen, and was fortunate to be a member of Carolina Crown, playing both Baritone and Euphonium. Mike holds a B.M. in Euphonium Performance from Western Michigan University, and Post-Baccalaureate teaching certification from Westfield State University in Westfield, MA.<br><br>As a drill designer, Mike has worked with ensembles across Michigan, Illinois, Kentucky, North Carolina, Tennessee, Ohio, and Virginia, among others throughout the country. These ensembles have appeared in several BOA Regional Finals, and enjoyed numerous state and regional championships.<br><br>Mike currently teaches the Blue Knights, and works in the Plymouth-Canton School District, where he teaches the nationally-renowned Plymouth-Canton Marching Band. Previously, Mike was on the visual staff at Teal Sound, and served as the Visual Caption head for the Troopers.'
      },
      {
        name: 'John Joseph',
        position: 'Visual Choreographer / Designer',
        image: 'img/staff/jj.jpg',
        area: ['design'],
        bio: 'John "JJ" Joseph graduated from Irondale High School (New Brighton, MN) in 2012 where he had been active in the color guard since 2009. The summer following graduation, JJ began his drum corps career as a member of the color guard with the Blue Stars Drum & Bugle Corps (La Crosse, WI) where he stayed through his age out season in 2014. His performance career also extends into the winter where he has marched with multiple groups. Most recently, JJ performed with 3-time Winter Guard International world champion color guard, Onyx, from Dayton, Ohio.<br><br>JJ has taught numerous color guards throughout the country including Irondale High School, Rocori High School, Elk River High School, Carroll High School, Southgate Anderson High School, Lakota West High School, Worthington Kilbourne High School, Northmont High School and Novi High School. JJ currently serves as the color guard director at Lebanon High School (Lebanon, OH).<br><br>He is pursuing a degree in Middle Childhood Education at Wright State University (Dayton, OH) where he hopes to earn his Bachelors. JJ is very excited to be working with Capital City Percussion this upcoming winter season.'
      },
      {
        name: 'Evan Brown',
        position: 'Sound Designer',
        image: 'img/staff/evan.jpg',
        area: ['design'],
        bio: 'Evan Brown is an active sound and amplification designer in the pageantry arts, hailing from Pittsburgh, PA and is excited to be joining the team at Cap City for 2017! Evan is a Sound Designer for many groups across the US, currently including Matrix Percussion (Open & World), Phantom Regiment, Oregon Crusaders, OCindoor, Kiski Area HS (PA), and many others. He is also the staff sound designer for Ferguson Design Solutions, a company providing arrangements, original compositions, consulting, and design resources for marching bands, drum corps, and indoor percussion ensembles in all major arenas of the pageantry arts.  He is currently the Percussion Coordinator and 2nd Assistant Band Director at North Allegheny HS in Wexford, PA.<br><br>Evan holds a Bachelor of the Arts Degree in Music from Slippery Rock University, where he performed and participated in a wide variety of ensembles, focusing most specifically on drumset, studying under Dr. David Glover. During the day, he is currently the Percussion Manager for Volkwein’s Music, an education based full-line music retailer in Pittsburgh, PA.'
      },
      {
        name: 'Mark Reynolds',
        position: 'Program Consultant',
        image: 'img/staff/mark.jpg',
        area: ['design'],
        bio: 'Mark Reynolds has been working as a teacher and arranger, and in the music industry, for the past 25 years. Born and raised in Columbus, Ohio, he studied music education at The Ohio State University before taking jobs with some of the top high schools and colleges in the country, including Dublin Coffman, Westerville North, Westerville South, Grove City, Hilliard Darby, Hilliard Davidson, Hilliard Bradley, Olentangy Liberty, Franklin Heights, Central Crossing, Thomas Worthington, Worthington Kilbourne, Springboro, Long Beach, Harrison Central, Reeths Puffer, Mississippi Gulf Coast Community College and Tyler Jr. College in Tyler, Texas. Mark has also taught and arranged for some of the top percussion ensembles in WGI (Winter Guard International) including RhythmX, Redline, Thomas Worthington, Hilliard Bradley, Capital Regiment and Tyler Jr. College.<br><br>Mark moved to Houston, Texas, in 2005 to become product manager for the Pro-Mark Corporation, then to Lake Geneva, Wisconsin, in 2006 to accept a position as the vice president of sales and marketing for DEG Music Inc. and Dynasty Brass and Percussion products. Reynolds spent seven years in Wisconsin before returning to Columbus to serve the music education community as a sales representative for Rettig Music, Inc. He is in his third year as percussion director for The Ohio State University Marching Band.'
      },
      {
        name: 'Jeremy Jorgenson',
        position: 'Program Consultant',
        image: 'img/staff/jeremy_j.jpg',
        area: ['design'],
        bio: 'Jeremy Jorgenson has been involved in the marching arts for nearly 20 years. He is a 5 time WGI medalist as a performer with Westerville South HS and Rhythm X. As President of JJ Visual Design, LLC, he has designed and consulted for scholastic and independent ensembles from across the United States and Japan. In 2015, he founded MarchingDotBook.com, which provides simple dot books for highly competitive ensembles.<br><br>Outside of the pageantry world, Jeremy serves as Chief Executive Officer of Robin Technologies Inc., a multimedia/web development firm based out of Worthington, OH. He holds a bachelor’s degree in Art from The Ohio State University. He enjoys spending time with his wife, Sarah, and their twin sons Jake and Sam.<br><br>Jeremy is excited to return to Capital City Percussion for the upcoming season!'
      },
      {
        name: 'Zac Jansheski',
        position: 'Battery Coordinator',
        image: 'img/staff/zac.jpg',
        area: ['battery'],
        bio: 'Zac Jansheski is incredibly excited to do great things as Battery Coordinator for Cap City this season. Zac is the founder and director of the Dayton Dragons MLB Drumline. He graduated from Miami University in December 2012 with a Bachelor\'s Degree in Music Education. At Miami University, Zac played in the Percussion Ensemble, Wind Ensemble, Symphony Orchestra, Symphony Band, Global Rhythms ensemble, and Steel Band. He has performed with and learned from several artists such as Dr. William Albin, Jeff Queen, Dr. Chris Tanner, Bob Becker, and Srinivas Krishnan.<br><br>While attending school, Zac had performance and teaching experiences with arguably some of the most elite groups in the marching arts. Zac played snare drum for 2013 WGI Gold Medalist Rhythm X and DCI 2012 Silver Medalist Carolina Crown, as well as serving as drum captain for the Miami University Marching Band. Zac is the recipient of several awards including the Friends of DCI Scholarship, the Lacey/Striple Highland Band and Drum Scholarship, and KK&#936; most inspirational band member award. In the past, Zac has performed with the Cincinnati Bengals "Growl" Drumline. He has also directed and arranged for WGI scholastic open finalist Kettering Fairmont HS.'
      },
      {
        name: 'Corey Cutler',
        position: 'Snare Technician',
        image: 'img/staff/corey.jpg',
        area: ['battery'],
        bio: 'Corey joined Cap City in the winter of 2014 as a member of the snare line, and was the snare section leader in 2015-2016. He has been active in the southern West Virginia marching percussion community as a battery coordinator, snare technician, consultant, arranger, and private lesson instructor for the past 5 years, working with such programs as Cabell Midland HS, Hurricane HS, and Spring Valley HS and winning multiple high percussion awards in the state.<br><br>Corey graduated from Marshall University with a B.B.A. in Management Information Systems and is working as a Technology Systems Specialist for the Wayne County School system. He currently resides in Huntington, WV with his cat Marcellus and enjoys spending any spare time building computers or spending time with his family.<br><br>This season, Corey will be returning to Cap City as a member of the staff and is honored to educate this rapidly growing ensemble!'
      },
      {
        name: 'Dominic Devito',
        position: 'Snare Technician',
        image: 'img/staff/dominic.jpg',
        area: ['battery'],
        bio: 'Dominic is beyond excited to work with the Cap City snare line for the 2017 season!<br><br>Dominic found a passion for drumming as an adolescent. His passion evolved from drum set to the marching activity when he entered high school. His participation in the indoor marching activity, and the outdoor marching activity, is where he found an even greater passion for performing. At age 17 he landed his first teaching job for a high school indoor percussion ensemble that competed in the Mid-East Performance Association. Dominic continued his teaching career with various high schools in the Indiana and Ohio area. He marched with Matrix Indoor Marching Percussion Ensemble in 2010 and in 2011. In the summer of 2011 Dominic was a part of the percussion staff for the Glassmen Drum and Bugle Corps, and he was the battery technician for Miami University Marching Band for the Fall semester in 2011. Dominic went on to teach Matrix Percussion World for their 2012, 2013, and 2014 seasons.'
      },
      {
        name: 'Jesse Sieff',
        position: 'Snare Technician',
        image: 'img/staff/jesse.jpg',
        area: ['battery'],
        bio: 'A freelance musician, composer, and passionate educator from Pittsburgh, Jesse Sieff is a dedicated supporter of the fine arts. In addition to extensive experience as a percussionist, he has accumulated a unique performance background that includes competitive athletics, dance, and theater.<br><br>Jesse has recently accepted a position as a snare drummer and active duty Marine with the "The Commandant\'s Own" United States Marine Drum and Bugle Corps, stationed in Marine Barracks Washington, D.C. He is scheduled to report for recruit training in September of 2016 and is honored to have the opportunity to serve while promoting his love for music and the marching arts.<br><br>Jesse is an alumnus of the Indiana University of Pennsylvania Department of Music - studying and performing among many talented musicians and professors. In addition to studying percussion under both Dr. Michael Kingan and Dr. Ronald Horner, Jesse\'s training includes over 3 years in the marching arts under the instruction of Rob Ferguson - director of Matrix Performing Arts, writer, designer, and world-class educator. Jesse\'s participation in collegiate marching bands, Winter Guard International, and Drum Corps International has provided countless opportunities for competitions, performances, and tours across both the United States and Europe.<br><br>Recently, Jesse has been composing modern percussion literature and designing creative media productions with an associate team of artists. Jesse composed a marching snare solo entitled "Chopstakovich", which was written over Mvt. II of the Symphony in C Minor, String Quartet No, 8, Op. 110 by Dmitri Shostakovich; it has since been published by Tapspace.com, and Jesse plans to continue creating productions of the highest possible quality. He is a proud endorser of GroverPro Percussion and Innovative Percussion.'
      },
      {
        name: 'Chad Fink',
        position: 'Bass Technician',
        image: 'img/staff/chad.jpg',
        area: ['battery'],
        bio: 'Chad was raised and currently resides in Huntington, WV. After marching with the Glassmen in 2006 he quickly transitioned into teaching. He has taught and arranged for various high schools in the area, winning high percussion in the state the past two years. He also enjoys giving private lessons, and many of his students have since gone on to perform and teach for various groups in DCI/WGI.<br><br>Chad has had the privilege of learning from/studying under many great educators, musicians, and performers including Dustin Lowes, Chris Hestin, Eric Ward, Jon Merritt, George Chaffin, Rudy Garcia, etc.<br><br>Chad is currently teaching percussion at Marshall University while continuing to consult and arrange for select high school programs. He is thrilled to be part of this staff and Cap City this coming season!'
      },
      {
        name: 'Ariel Peel',
        position: 'Cymbal Technician',
        image: 'img/staff/ariel.jpg',
        area: ['battery'],
        bio: 'Ariel found her passion for playing cymbals with the Indiana University Drumline in the Fall of 2012 and returned in 2013 as section leader. She marched her first year of Independent World with Legacy Indoor Percussion as the cymbal section leader in 2013, their debut season. Ariel then went on to march two seasons with Rhythm X, receiving a bronze medal in 2014 and a silver in 2015. She also marched the Crossmen Drum and Bugle Corps cymbal line in 2014, becoming a DCI Finalist.<br><br>Ariel finished her undergraduate study at Indiana University in 2015, graduating with a Bachelor of Arts in Psychology and Gender Studies. She now works as a social worker for the State of Indiana. Ariel teaches the cymbal line at the Scholastic World group Center Grove High School and is excited to to get started with Cap City this winter.'
      },
      {
        name: 'Kyle Goodheart',
        position: 'Bass Technician',
        image: 'img/staff/kyle.jpg',
        area: ['battery'],
        bio: 'Kyle Goodhart is a native of Middle Eastern, Pennsylvania. He joins Cap City with a wealth of experience including marching bass drum with the Hawthorne Caballeros 2011-2012, Cadets2 2013, Cadets 2014-2015, and Rhythm X 2015. Kyle is a graduate of the California University of Pennsylvania with a bachelors degree in business administration concentrated in financial management, and currently works for the United States Army.<br><br>Kyle is very excited to join the team at Cap City!'
      },
      {
        name: 'Cooper Mannon',
        position: 'Cymbal Technician',
        image: 'img/staff/cooper.jpg',
        area: ['battery'],
        bio: 'Hailing from Toledo, Ohio, Cooper\'s time in the marching activity has been short yet impactful. His cymbal experience holds its roots with the Bowling Green State University marching band (2010), as well as Notre Dame Indoor Percussion Ensemble (PIO) (2013, 2014), winning the Kymbos cymbal scholarship his age out year. Cooper went on to become the cymbal technician at Notre Dame Indoor for the 2015 season, and stepped into the DCI world the following summer as cymbal technician for Pioneer Drum & Bugle Corps. Cooper was one of the founding staff members of Burning River Percussion (PIO) based out of Cleveland, Ohio for the 2016 WGI season. He continued his work with Pioneer DBC for the DCI 2016 tour, stepping into an electronics and sound design role on top of his cymbal duties.<br><br>Cooper is a recent graduate of Cuyahoga Community College with a degree in Recording Arts & Technology, which he hopes to use to become more involved with the audio side of the marching arts activity. He enjoys running sound for local concerts in Cleveland, spending too much time at Chipotle, and hanging out with his cat Boogers.'
      },
      {
        name: 'John McFarland',
        position: 'Administrative Staff / Battery Technician',
        image: 'img/staff/john.jpg',
        area: ['admin', 'battery'],
        bio: 'John Max McFarland received his degrees in Composition (B.M.) and Percussion Performance (B.M., M.M.) from Western Michigan University. He has performed with the Kalamazoo Symphony and Battlecreek Symphony as a substitute percussionist. John was a marching member of the Kiwanis Kavaliers Drum & Bugle Corps (1999-2001) and the Santa Clara Vanguard Drum & Bugle Corps (2002 - 2004). John studied composition under Curtis Curtis-Smith, Dr. Richard Adams, and Dr. Robert Ricci. His compositions and arrangements have received international recognition with performances all over the United States, Hong Kong, and Taiwan. He is also the owner and head music designer for Six to Five Productions, LLC, a music publishing and design company dedicated to publishing new music for Marching Band, Winter Percussion, and WGI Winds groups.<br><br>John has a full yearly schedule composing and arranging music for marching band and winter percussion. Some notable clients include MacArthur High School (San Antonio, TX), East Mississippi Community College (Scooba, MS), Onondaga Community College (Syracuse, NY), Eastside Fury Winter Percussion Ensemble (Harrison Twp, MI), and Ferndale Independent Percussion (WGI Silver Medalists 2015). He is also currently the percussion arranger for Pioneer Drum and Bugle Corps (Milwaukee, WI).<br><br>John resides in Parma Heights, a suburb of Cleveland, Ohio with his wife Sydney, his son Camden, his 2 cats (Zoe and Minkah), his 4 greyhounds (Jason, Jasper, Lola, and Walker), and his Italian Greyhound (Sophia).<br><br>John is extremely excited and humbled to be a part of Cap City Percussion and can\'t wait for the upcoming season!'
      },
      {
        name: 'Calvin Fackrell',
        position: 'Visual Coordinator',
        image: 'img/staff/calvin.jpg',
        area: ['visual'],
        bio: 'Calvin was raised in Vancouver, WA and continued his passion for the marching arts in the Pacific Northwest. After graduating high school, Calvin\'s performing experience with drum corps has included the Oregon Crusaders in 2006, the Cascades in 2007, and the Blue Devils from 2008-2010. His experience with The Blue Devils includes two years on the leadership team, two years as a soloist, and two DCI World Championships. Following Calvin\'s age out in 2010, he started teaching the Troopers Drum & Bugle Corps in 2011. He worked two summers with Troopers, and since has been teaching the Cascades Drum Corps in the role of visual supervisor.<br><br>Calvin\'s fall experience started in the northwest; teaching at Kamiak, Evergreen, Hockinson, West Valley, and Eisenhower High Schools. Currently, Calvin lives in Cincinnati, OH and works with Colerain High School full time as their brass and visual director. He also spends time with LaSalle High School as visual caption head, as well as a visual consultant at Lakota East High School.<br><br>As a designer, Calvin\'s drill writing is in demand nationally throughout schools and independent groups in Washington, Oregon, Idaho, Utah, and Ohio. He is incredibly excited to take on a new role with Cap City as visual director in his third year with the program!'
      },
      {
        name: 'Jon Popham',
        position: 'Visual Technician',
        image: 'img/staff/jon.jpg',
        area: ['visual'],
        bio: 'Jon Popham is currently a visual instructor with the Blue Knights Drum & Bugle Corps from Denver, Colorado. He joined the Blue Knights in 2013 and has just completed his third summer with the organization. Prior to joining the Blue Knights, he was on the visual staff with the Glassmen Drum and Bugle Corps in 2011 and 2012. Jon\'s marching experience includes two years as a trumpet player with the Glassmen Drum and Bugle Corps, where he aged out in 2010.<br><br>In the fall, Jon is an active visual clinician and designer for bands throughout Kentucky and southwest Ohio. He has been the visual caption head for the Williamstown High School "Band of Spirit" since 2009. While being on staff at Williamstown, the band has been a KMEA state finalist multiple times and BOA Regional Class Champion. He has also been on the instructional staff with the Sycamore High School Marching Band from Cincinnati, OH since 2013.<br><br>Jon currently resides in Florence, Kentucky. He is a Special Education (Learning and Behavior Disabilities) teacher at Williamstown Independent Schools and a 2012 graduate from the University of Kentucky.'
      },
      {
        name: 'Phillip Showalter',
        position: 'Visual Technician',
        image: 'img/staff/phil.jpg',
        area: ['visual'],
        bio: 'Phillip Showalter is a visual technician for Cap City. Originally from Marietta, Ohio, Phillip completed a degree in Music Education from Ohio University in Athens, Ohio. Phillip is now the assistant band director at Watkins Memorial High School in Pataskala, Ohio where he helps with the all of the bands 6-12. Along with his responsibilities with the Watkins Memorial Marching Warriors, Phillip is on staff for the Worthington Kilbourne High School Marching Band in Columbus. In the summer of 2014, Phillip marched for the Bluecoats Drum and Bugle Corps as a trumpet player which led to a position on the visual staff for the Blue Knights in 2015 and now with the Bluecoats.'
      },
      {
        name: 'Brandon Wickham',
        position: 'Visual Technician',
        image: 'img/staff/brandon.jpg',
        area: ['visual'],
        bio: 'Brandon Wickham is a visual designer, clinician, and marching instructor from California. Brandon began his marching career as a baritone player in 2004 with the Vanguard Cadet Drum and Bugle Corps from Santa Clara, California and went on to join the Blue Devils Drum and Bugle Corps in 2005.<br><br>Since aging out from the Blue Devils organization in 2008, Brandon has gone on to work with several award winning high schools throughout California and the Mid-Western United States. From 2011-2015, Brandon worked as a designer and visual caption head of the 2011 and 2012 WBA Champion and 2013 BOA Grand National Finalist, Ayala High School Band and Color Guard, as well as the 2013 WBA Champion Upland High School Marching Band. After the 2015 competitive season, Brandon moved to Indianapolis, Indiana where he has since joined the staff of several high school programs in the area including the Ben Davis Marching Giants, the Center Grove High School Marching Band, and the Avon Marching Black and Gold.<br><br>Aside from scholastic fall and winter programs, Brandon also teaches throughout the summer with DCI. After being asked to join the visual staff of the Pacific Crest Drum and Bugle Corps in 2013, Brandon went on to become the visual caption head of the Academy Drum and Bugle in 2014 and 2015; and in 2016 was asked to join the visual staff for the Blue Devils Drum and Bugle Corps.<br><br>When he is not teaching, Brandon works as a visual designer and clinician for several groups across the United States as well as international groups in China and South America. As a drill writer, Brandon has designed for numerous fall and winter programs in several states across the country and has also designed for marching ensembles in China and Taiwan.'
      },
      {
        name: 'Bob Knowles',
        position: 'Front Ensemble Coordinator',
        image: 'img/staff/bob.jpg',
        area: ['front'],
        bio: 'Bob Knowles is a native of Columbus, Ohio and joins Cap City with over 10 years of experience in the marching arts. After graduating from Franklin Heights HS in 2009, he attended Morehead State University in Kentucky where he majored in music education, and studied percussion with Dr. Brian Mason and Frank Oddis.<br><br>Throughout his college career, Bob was involved in several symphonic, percussion, and marching percussion ensembles. Bob performed as center marimba with Cap City in 2012 and 2013, receiving a gold medal in 2013 as the WGI PIO Champions.  Bob was also a member of the marimba line for the 2012 PIW Finalist Matrix.<br><br>As an up and coming percussion educator in the Columbus community, Bob has served many roles. A few of which include being a Percussion Director, Front Ensemble Technician, and Front Ensemble Arranger for various programs throughout the region including Clinton-Massie High School, Franklin Heights High School, Westland High School, Central Crossing High School, Westerville South High School, and worked with Connexus Percussion in their 2014 and 2015 seasons.<br><br>"2017 will be a big year for Cap City, and I\'m very excited to be involved with the home team!"'
      },
      {
        name: 'Tyler Stewart',
        position: 'Front Ensemble Technician',
        image: 'img/staff/tyler.jpg',
        area: ['front'],
        bio: 'Tyler is a native of West Virginia and recently received his BFA in Music Performance at Marshall University in Huntington, WV. During his experience at Marshall, Tyler has avidly performed in as many ensembles has he can fit into his schedule.<br><br>For the past four years, He has taught and arranged music for the front ensemble at Hurricane High School and consulted at other programs including Grove City High School, Capital High School, Cabell Midland High School, and many others. Tyler is one of many educators in the West Virginia area dedicated to advancing the area of percussion, modernizing it to be able to compete with other states, and giving as many opportunities for students to succeed and push to be proud performers and educators.<br><br>Tyler has performed with many different percussion and jazz ensembles across the world. Most recently he has performed as a part of Gateway Indoor Percussion Ensemble based out of St. Louis, MO (2013-2014) and Music City Drum and Bugle Corps based out of Nashville, TN (2010-2011). Tyler also actively plays drum set/percussion in many different local jazz ensembles and musical combos in the Huntington-Charleston region in WV.'
      },
      {
        name: 'Stephen Monath',
        position: 'Front Ensemble Techician',
        image: 'img/staff/stephen.jpg',
        area: ['front'],
        bio: 'Stephen Monath is a senior Music Education and Performance major at Wright State University. He was a member of the Glassmen in 2010 & 2012, and a member of Matrix from 2011-2014. Stephen is currently the Percussion Director for Tipp City Schools in Tipp City Ohio, and has worked with several other high schools in the Dayton area.<br><br>Stephen is an active member of the Wright State University Percussion Ensemble, under the direction of Gerald Noble. Stephen will be performing with the Wright State University Percussion Ensemble in their debut performance at PASIC this fall. Prior to moving to Dayton, Stephen attended Cuyahoga Community College and worked with the Amherst and Norton band programs.'
      },
      {
        name: 'Jeremy Dover',
        position: 'Administrative Staff / Front Ensemble Technician',
        image: 'img/staff/jeremy_d.jpg',
        area: ['admin', 'front'],
        bio: 'Jeremy has been involved with the marching arts and marching percussion since childhood. He was a founding member of Cap City, and aged out in 2016 after 5 years in the front ensemble.  He served center marimba and front ensemble section leader for his final 3 years at Cap, and is proud to return to the staff as a front ensemble technician.<br><br>Jeremy is very active around the city of Columbus, performing with community groups as well as college bands. Highlights include regular performances with then Worthington Civic Band and Winds of Ohio. He is also a proud member of the Ohio State University Band and teaches high school front ensemble at Central Crossing High School.<br><br>"I am very excited for this season, and I believe Cap City will do great things!"'
      },
      {
        name: 'Nick Kutskill',
        position: 'Media Specialist',
        image: 'img/staff/nick.jpg',
        area: ['admin'],
        bio: 'Nick is a student filmmaker from Michigan who began his relationship with Cap City on the 2014 snareline. Since then, he has taken the role of Media Specialist, which involves recording, editing, and producing online video content for Cap City throughout their competitive season.<br><br>Nick is a senior at Wright State University in Dayton, Ohio. He is seeking a Bachelor of Fine Arts degree in Motion Picture Production with a minor in Marketing.<br><br>As a dedicated fan of both indoor drumline and motion pictures, Nick has found his place at Cap City to be an enjoyable and rewarding opportunity to blend these passions together.<br><br>Before his start at Cap City, Nick was a member of the Motor City Percussion snareline, based out of Livonia, Michigan, for two seasons.'
      }
    ]
  },

  computed: {
    admin: function() {
      var arr = [];
      for (var i = 0; i < this.staff.length; i++) {
        for (var j = 0; j < this.staff[i].area.length; j++) {
          if (this.staff[i].area[j] === 'admin') {
            arr.push(this.staff[i]);
            break;
          }
        }
      }
      return arr;
    },
    design: function() {
      var arr = [];
      for (var i = 0; i < this.staff.length; i++) {
        for (var j = 0; j < this.staff[i].area.length; j++) {
          if (this.staff[i].area[j] === 'design') {
            arr.push(this.staff[i]);
            break;
          }
        }
      }
      return arr;
    },
    battery: function() {
      var arr = [];
      for (var i = 0; i < this.staff.length; i++) {
        for (var j = 0;j < this.staff[i].area.length; j++) {
          if (this.staff[i].area[j] === 'battery') {
            arr.push(this.staff[i]);
            break;
          }
        }
      }
      return arr;
    },
    front: function() {
      var arr = [];
      for (var i = 0; i < this.staff.length; i++) {
        for (var j = 0; j < this.staff[i].area.length; j++) {
          if (this.staff[i].area[j] === 'front') {
            arr.push(this.staff[i]);
            break;
          }
        }
      }
      return arr;
    },
    visual: function() {
      var arr = [];
      for (var i = 0; i < this.staff.length; i++) {
        for (var j = 0; j < this.staff[i].area.length; j++) {
          if (this.staff[i].area[j] === 'visual') {
            arr.push(this.staff[i]);
            break;
          }
        }
      }
      return arr;
    },
  },

  methods: {

    modal: function(name) {

      var person = null;
      for (var i = 0; i < this.staff.length; i++) {
        if (name === this.staff[i].name) {
          person = this.staff[i];
        }
      }

      if (person === null) return;

      var name = document.getElementById('detail-name');
      var position = document.getElementById('detail-position');
      var bio = document.getElementById('detail-bio');
      var image = document.getElementById('detail-image');

      name.innerHTML = person.name;
      position.innerHTML = person.position;
      bio.innerHTML = person.bio;
      image.src = person.image;
    }
  }
});

$(document).ready(function() {
  $('.modal-trigger').leanModal();
  $('ul.tabs').tabs();
});
