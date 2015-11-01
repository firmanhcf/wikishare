<?php

use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder {

	public function run()
	{
		\App\Article::create([
			'user_id' => 8,
			'category_id' => 1,
			'title' => 'Lorem Ipsum Dolor Sit Amet',
			'slug' => 'lorem-ipsum-dolor-sit-amet',
			'content' => '<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><img src="http://khezo.com/wp-content/uploads/2013/06/Gambar-Upin-Ipin-Bermain.jpg" alt="" width="281" height="210" /></p><h2><strong>Where does it come from?</strong></h2><p>Contrary to popular belief, <em>Lorem Ipsum</em> is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", <em>comes from a line in section 1.10.32</em>.</p><ol><li>Liste 1 o liste</li><li>Liste 2 o lusto</li><li>Liste 3 o lalista</li></ol><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>',
			'article_status' => 'published',
			'approval_status' => 'accepted'
		]);
		
		\App\Article::create([
			'user_id' => 8,
			'category_id' => 1,
			'title' => 'Amet Dolor Sit Lorem',
			'slug' => 'amet-dolor-sit-lorem',
			'content' => '<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><img src="http://khezo.com/wp-content/uploads/2013/06/Gambar-Upin-Ipin-Bermain.jpg" alt="" width="281" height="210" /></p><h2><strong>Where does it come from?</strong></h2><p>Contrary to popular belief, <em>Lorem Ipsum</em> is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", <em>comes from a line in section 1.10.32</em>.</p><ol><li>Liste 1 o liste</li><li>Liste 2 o lusto</li><li>Liste 3 o lalista</li></ol><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>',
			'article_status' => 'published',
			'approval_status' => 'accepted'
		]);

		\App\Article::create([
			'user_id' => 8,
			'category_id' => 1,
			'title' => 'Dolor Sit Lorem',
			'slug' => 'dolor-sit-lorem',
			'content' => '<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><img src="http://khezo.com/wp-content/uploads/2013/06/Gambar-Upin-Ipin-Bermain.jpg" alt="" width="281" height="210" /></p><h2><strong>Where does it come from?</strong></h2><p>Contrary to popular belief, <em>Lorem Ipsum</em> is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", <em>comes from a line in section 1.10.32</em>.</p><ol><li>Liste 1 o liste</li><li>Liste 2 o lusto</li><li>Liste 3 o lalista</li></ol><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>',
			'article_status' => 'published',
			'approval_status' => 'accepted'
		]);

		\App\Article::create([
			'user_id' => 8,
			'category_id' => 1,
			'title' => 'Amet Dolor Lorem',
			'slug' => 'amet-dolor-lorem',
			'content' => '<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><img src="http://khezo.com/wp-content/uploads/2013/06/Gambar-Upin-Ipin-Bermain.jpg" alt="" width="281" height="210" /></p><h2><strong>Where does it come from?</strong></h2><p>Contrary to popular belief, <em>Lorem Ipsum</em> is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", <em>comes from a line in section 1.10.32</em>.</p><ol><li>Liste 1 o liste</li><li>Liste 2 o lusto</li><li>Liste 3 o lalista</li></ol><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>',
			'article_status' => 'published',
			'approval_status' => 'accepted'
		]);

		\App\Article::create([
			'user_id' => 8,
			'category_id' => 1,
			'title' => 'Sit Lorem Ipsum Lorem',
			'slug' => 'sit-lorem-ipsum-lorem',
			'content' => '<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><img src="http://khezo.com/wp-content/uploads/2013/06/Gambar-Upin-Ipin-Bermain.jpg" alt="" width="281" height="210" /></p><h2><strong>Where does it come from?</strong></h2><p>Contrary to popular belief, <em>Lorem Ipsum</em> is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", <em>comes from a line in section 1.10.32</em>.</p><ol><li>Liste 1 o liste</li><li>Liste 2 o lusto</li><li>Liste 3 o lalista</li></ol><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>',
			'article_status' => 'published',
			'approval_status' => 'accepted'
		]);

		\App\Article::create([
			'user_id' => 2,
			'category_id' => 1,
			'title' => 'Ipsum Lorem Dolor',
			'slug' => 'ipsum-lorem-dolor',
			'content' => '<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><img src="http://khezo.com/wp-content/uploads/2013/06/Gambar-Upin-Ipin-Bermain.jpg" alt="" width="281" height="210" /></p><h2><strong>Where does it come from?</strong></h2><p>Contrary to popular belief, <em>Lorem Ipsum</em> is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", <em>comes from a line in section 1.10.32</em>.</p><ol><li>Liste 1 o liste</li><li>Liste 2 o lusto</li><li>Liste 3 o lalista</li></ol><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>',
			'article_status' => 'published',
			'approval_status' => 'accepted'
		]);

		\App\Article::create([
			'user_id' => 2,
			'category_id' => 1,
			'title' => 'What is Lorem Ipsum',
			'slug' => 'what-is-lorem-ipsum',
			'content' => '<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><img src="http://khezo.com/wp-content/uploads/2013/06/Gambar-Upin-Ipin-Bermain.jpg" alt="" width="281" height="210" /></p><h2><strong>Where does it come from?</strong></h2><p>Contrary to popular belief, <em>Lorem Ipsum</em> is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", <em>comes from a line in section 1.10.32</em>.</p><ol><li>Liste 1 o liste</li><li>Liste 2 o lusto</li><li>Liste 3 o lalista</li></ol><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>',
			'article_status' => 'published',
			'approval_status' => 'accepted'
		]);

		\App\Article::create([
			'user_id' => 2,
			'category_id' => 1,
			'title' => 'Ipsum Lorem Dolor',
			'slug' => 'ipsum-lorem-dolor',
			'content' => '<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><img src="http://khezo.com/wp-content/uploads/2013/06/Gambar-Upin-Ipin-Bermain.jpg" alt="" width="281" height="210" /></p><h2><strong>Where does it come from?</strong></h2><p>Contrary to popular belief, <em>Lorem Ipsum</em> is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", <em>comes from a line in section 1.10.32</em>.</p><ol><li>Liste 1 o liste</li><li>Liste 2 o lusto</li><li>Liste 3 o lalista</li></ol><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>',
			'article_status' => 'published',
			'approval_status' => 'accepted'
		]);

		\App\Article::create([
			'user_id' => 2,
			'category_id' => 1,
			'title' => 'What is Lorem Ipsum',
			'slug' => 'what-is-lorem-ipsum',
			'content' => '<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><img src="http://khezo.com/wp-content/uploads/2013/06/Gambar-Upin-Ipin-Bermain.jpg" alt="" width="281" height="210" /></p><h2><strong>Where does it come from?</strong></h2><p>Contrary to popular belief, <em>Lorem Ipsum</em> is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", <em>comes from a line in section 1.10.32</em>.</p><ol><li>Liste 1 o liste</li><li>Liste 2 o lusto</li><li>Liste 3 o lalista</li></ol><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>',
			'article_status' => 'published',
			'approval_status' => 'accepted'
		]);

		\App\Article::create([
			'user_id' => 2,
			'category_id' => 1,
			'title' => 'Ipsum Lorem Dolor',
			'slug' => 'ipsum-lorem-dolor',
			'content' => '<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><img src="http://khezo.com/wp-content/uploads/2013/06/Gambar-Upin-Ipin-Bermain.jpg" alt="" width="281" height="210" /></p><h2><strong>Where does it come from?</strong></h2><p>Contrary to popular belief, <em>Lorem Ipsum</em> is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", <em>comes from a line in section 1.10.32</em>.</p><ol><li>Liste 1 o liste</li><li>Liste 2 o lusto</li><li>Liste 3 o lalista</li></ol><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>',
			'article_status' => 'published',
			'approval_status' => 'accepted'
		]);

		\App\Article::create([
			'user_id' => 2,
			'category_id' => 1,
			'title' => 'What is Lorem Ipsum',
			'slug' => 'what-is-lorem-ipsum',
			'content' => '<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><img src="http://khezo.com/wp-content/uploads/2013/06/Gambar-Upin-Ipin-Bermain.jpg" alt="" width="281" height="210" /></p><h2><strong>Where does it come from?</strong></h2><p>Contrary to popular belief, <em>Lorem Ipsum</em> is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", <em>comes from a line in section 1.10.32</em>.</p><ol><li>Liste 1 o liste</li><li>Liste 2 o lusto</li><li>Liste 3 o lalista</li></ol><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>',
			'article_status' => 'published',
			'approval_status' => 'accepted'
		]);


		\App\Article::create([
			'user_id' => 2,
			'category_id' => 1,
			'title' => 'Ipsum Lorem Dolor',
			'slug' => 'ipsum-lorem-dolor',
			'content' => '<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><img src="http://khezo.com/wp-content/uploads/2013/06/Gambar-Upin-Ipin-Bermain.jpg" alt="" width="281" height="210" /></p><h2><strong>Where does it come from?</strong></h2><p>Contrary to popular belief, <em>Lorem Ipsum</em> is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", <em>comes from a line in section 1.10.32</em>.</p><ol><li>Liste 1 o liste</li><li>Liste 2 o lusto</li><li>Liste 3 o lalista</li></ol><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>',
			'article_status' => 'published',
			'approval_status' => 'accepted'
		]);

		\App\Article::create([
			'user_id' => 2,
			'category_id' => 1,
			'title' => 'What is Lorem Ipsum',
			'slug' => 'what-is-lorem-ipsum',
			'content' => '<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><img src="http://khezo.com/wp-content/uploads/2013/06/Gambar-Upin-Ipin-Bermain.jpg" alt="" width="281" height="210" /></p><h2><strong>Where does it come from?</strong></h2><p>Contrary to popular belief, <em>Lorem Ipsum</em> is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", <em>comes from a line in section 1.10.32</em>.</p><ol><li>Liste 1 o liste</li><li>Liste 2 o lusto</li><li>Liste 3 o lalista</li></ol><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>',
			'article_status' => 'published',
			'approval_status' => 'accepted'
		]);

		\App\Article::create([
			'user_id' => 2,
			'category_id' => 1,
			'title' => 'Ipsum Lorem Dolor',
			'slug' => 'ipsum-lorem-dolor',
			'content' => '<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><img src="http://khezo.com/wp-content/uploads/2013/06/Gambar-Upin-Ipin-Bermain.jpg" alt="" width="281" height="210" /></p><h2><strong>Where does it come from?</strong></h2><p>Contrary to popular belief, <em>Lorem Ipsum</em> is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", <em>comes from a line in section 1.10.32</em>.</p><ol><li>Liste 1 o liste</li><li>Liste 2 o lusto</li><li>Liste 3 o lalista</li></ol><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>',
			'article_status' => 'published',
			'approval_status' => 'accepted'
		]);

		\App\Article::create([
			'user_id' => 2,
			'category_id' => 1,
			'title' => 'What is Lorem Ipsum',
			'slug' => 'what-is-lorem-ipsum',
			'content' => '<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><img src="http://khezo.com/wp-content/uploads/2013/06/Gambar-Upin-Ipin-Bermain.jpg" alt="" width="281" height="210" /></p><h2><strong>Where does it come from?</strong></h2><p>Contrary to popular belief, <em>Lorem Ipsum</em> is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", <em>comes from a line in section 1.10.32</em>.</p><ol><li>Liste 1 o liste</li><li>Liste 2 o lusto</li><li>Liste 3 o lalista</li></ol><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>',
			'article_status' => 'published',
			'approval_status' => 'accepted'
		]);

		\App\Article::create([
			'user_id' => 2,
			'category_id' => 1,
			'title' => 'Ipsum Lorem Dolor',
			'slug' => 'ipsum-lorem-dolor',
			'content' => '<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><img src="http://khezo.com/wp-content/uploads/2013/06/Gambar-Upin-Ipin-Bermain.jpg" alt="" width="281" height="210" /></p><h2><strong>Where does it come from?</strong></h2><p>Contrary to popular belief, <em>Lorem Ipsum</em> is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", <em>comes from a line in section 1.10.32</em>.</p><ol><li>Liste 1 o liste</li><li>Liste 2 o lusto</li><li>Liste 3 o lalista</li></ol><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>',
			'article_status' => 'published',
			'approval_status' => 'accepted'
		]);

		\App\Article::create([
			'user_id' => 3,
			'category_id' => 1,
			'title' => 'What is Lorem Ipsum',
			'slug' => 'what-is-lorem-ipsum',
			'content' => '<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><img src="http://khezo.com/wp-content/uploads/2013/06/Gambar-Upin-Ipin-Bermain.jpg" alt="" width="281" height="210" /></p><h2><strong>Where does it come from?</strong></h2><p>Contrary to popular belief, <em>Lorem Ipsum</em> is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", <em>comes from a line in section 1.10.32</em>.</p><ol><li>Liste 1 o liste</li><li>Liste 2 o lusto</li><li>Liste 3 o lalista</li></ol><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>',
			'article_status' => 'published',
			'approval_status' => 'accepted'
		]);

		\App\Article::create([
			'user_id' => 3,
			'category_id' => 1,
			'title' => 'Ipsum Lorem Dolor',
			'slug' => 'ipsum-lorem-dolor',
			'content' => '<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><img src="http://khezo.com/wp-content/uploads/2013/06/Gambar-Upin-Ipin-Bermain.jpg" alt="" width="281" height="210" /></p><h2><strong>Where does it come from?</strong></h2><p>Contrary to popular belief, <em>Lorem Ipsum</em> is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", <em>comes from a line in section 1.10.32</em>.</p><ol><li>Liste 1 o liste</li><li>Liste 2 o lusto</li><li>Liste 3 o lalista</li></ol><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>',
			'article_status' => 'published',
			'approval_status' => 'accepted'
		]);

		\App\Article::create([
			'user_id' => 4,
			'category_id' => 1,
			'title' => 'What is Lorem Ipsum',
			'slug' => 'what-is-lorem-ipsum',
			'content' => '<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><img src="http://khezo.com/wp-content/uploads/2013/06/Gambar-Upin-Ipin-Bermain.jpg" alt="" width="281" height="210" /></p><h2><strong>Where does it come from?</strong></h2><p>Contrary to popular belief, <em>Lorem Ipsum</em> is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", <em>comes from a line in section 1.10.32</em>.</p><ol><li>Liste 1 o liste</li><li>Liste 2 o lusto</li><li>Liste 3 o lalista</li></ol><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>',
			'article_status' => 'published',
			'approval_status' => 'accepted'
		]);

		\App\Article::create([
			'user_id' => 4,
			'category_id' => 1,
			'title' => 'Ipsum Lorem Dolor',
			'slug' => 'ipsum-lorem-dolor',
			'content' => '<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><img src="http://khezo.com/wp-content/uploads/2013/06/Gambar-Upin-Ipin-Bermain.jpg" alt="" width="281" height="210" /></p><h2><strong>Where does it come from?</strong></h2><p>Contrary to popular belief, <em>Lorem Ipsum</em> is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", <em>comes from a line in section 1.10.32</em>.</p><ol><li>Liste 1 o liste</li><li>Liste 2 o lusto</li><li>Liste 3 o lalista</li></ol><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>',
			'article_status' => 'published',
			'approval_status' => 'accepted'
		]);

		\App\Article::create([
			'user_id' => 4,
			'category_id' => 1,
			'title' => 'What is Lorem Ipsum',
			'slug' => 'what-is-lorem-ipsum',
			'content' => '<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><img src="http://khezo.com/wp-content/uploads/2013/06/Gambar-Upin-Ipin-Bermain.jpg" alt="" width="281" height="210" /></p><h2><strong>Where does it come from?</strong></h2><p>Contrary to popular belief, <em>Lorem Ipsum</em> is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", <em>comes from a line in section 1.10.32</em>.</p><ol><li>Liste 1 o liste</li><li>Liste 2 o lusto</li><li>Liste 3 o lalista</li></ol><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>',
			'article_status' => 'published',
			'approval_status' => 'accepted'
		]);

		\App\Article::create([
			'user_id' => 4,
			'category_id' => 1,
			'title' => 'Ipsum Lorem Dolor',
			'slug' => 'ipsum-lorem-dolor',
			'content' => '<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><img src="http://khezo.com/wp-content/uploads/2013/06/Gambar-Upin-Ipin-Bermain.jpg" alt="" width="281" height="210" /></p><h2><strong>Where does it come from?</strong></h2><p>Contrary to popular belief, <em>Lorem Ipsum</em> is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", <em>comes from a line in section 1.10.32</em>.</p><ol><li>Liste 1 o liste</li><li>Liste 2 o lusto</li><li>Liste 3 o lalista</li></ol><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>',
			'article_status' => 'published',
			'approval_status' => 'accepted'
		]);

		\App\Article::create([
			'user_id' => 4,
			'category_id' => 1,
			'title' => 'What is Lorem Ipsum',
			'slug' => 'what-is-lorem-ipsum',
			'content' => '<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><img src="http://khezo.com/wp-content/uploads/2013/06/Gambar-Upin-Ipin-Bermain.jpg" alt="" width="281" height="210" /></p><h2><strong>Where does it come from?</strong></h2><p>Contrary to popular belief, <em>Lorem Ipsum</em> is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", <em>comes from a line in section 1.10.32</em>.</p><ol><li>Liste 1 o liste</li><li>Liste 2 o lusto</li><li>Liste 3 o lalista</li></ol><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>',
			'article_status' => 'published',
			'approval_status' => 'accepted'
		]);


		\App\Article::create([
			'user_id' => 5,
			'category_id' => 1,
			'title' => 'Ipsum Lorem Dolor',
			'slug' => 'ipsum-lorem-dolor',
			'content' => '<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><img src="http://khezo.com/wp-content/uploads/2013/06/Gambar-Upin-Ipin-Bermain.jpg" alt="" width="281" height="210" /></p><h2><strong>Where does it come from?</strong></h2><p>Contrary to popular belief, <em>Lorem Ipsum</em> is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", <em>comes from a line in section 1.10.32</em>.</p><ol><li>Liste 1 o liste</li><li>Liste 2 o lusto</li><li>Liste 3 o lalista</li></ol><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>',
			'article_status' => 'published',
			'approval_status' => 'accepted'
		]);

		\App\Article::create([
			'user_id' => 5,
			'category_id' => 1,
			'title' => 'What is Lorem Ipsum',
			'slug' => 'what-is-lorem-ipsum',
			'content' => '<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><img src="http://khezo.com/wp-content/uploads/2013/06/Gambar-Upin-Ipin-Bermain.jpg" alt="" width="281" height="210" /></p><h2><strong>Where does it come from?</strong></h2><p>Contrary to popular belief, <em>Lorem Ipsum</em> is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", <em>comes from a line in section 1.10.32</em>.</p><ol><li>Liste 1 o liste</li><li>Liste 2 o lusto</li><li>Liste 3 o lalista</li></ol><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>',
			'article_status' => 'published',
			'approval_status' => 'accepted'
		]);
		//# COMMENTS

		\App\ArticleComment::create([
			'user_id' => 5,
			'article_id' => 3,
			
			'comment' => 'Proin sapien odio, posuere non elementum et, commodo et nisl. Nulla facilisi. Proin vitae sagittis arcu. Nullam euismod magna non tempor tincidunt. In vitae quam id enim ornare ultrices. Fusce tristique ultricies tortor, at elementum magna condimentum nec. Integer lectus velit, fermentum quis urna eu, rhoncus tristique lectus.'
		]);

		\App\ArticleComment::create([
			'user_id' => 8,
			'article_id' => 3,
			
			'comment' => 'Proin sapien odio, posuere non elementum et, commodo et nisl. Nulla facilisi. Proin vitae sagittis arcu. Nullam euismod magna non tempor tincidunt. In vitae quam id enim ornare ultrices. Fusce tristique ultricies tortor, at elementum magna condimentum nec. Integer lectus velit, fermentum quis urna eu, rhoncus tristique lectus.'
		]);

		\App\ArticleComment::create([
			'user_id' => 4,
			'article_id' => 3,
			
			'comment' => 'Proin sapien odio, posuere non elementum et, commodo et nisl. Nulla facilisi. Proin vitae sagittis arcu. Nullam euismod magna non tempor tincidunt. In vitae quam id enim ornare ultrices. Fusce tristique ultricies tortor, at elementum magna condimentum nec. Integer lectus velit, fermentum quis urna eu, rhoncus tristique lectus.'
		]);

		\App\ArticleComment::create([
			'user_id' => 2,
			'article_id' => 3,
			
			'comment' => 'Proin sapien odio, posuere non elementum et, commodo et nisl. Nulla facilisi. Proin vitae sagittis arcu. Nullam euismod magna non tempor tincidunt. In vitae quam id enim ornare ultrices. Fusce tristique ultricies tortor, at elementum magna condimentum nec. Integer lectus velit, fermentum quis urna eu, rhoncus tristique lectus.'
		]);

		\App\ArticleComment::create([
			'user_id' => 5,
			'article_id' => 3,
			
			'comment' => 'Proin sapien odio, posuere non elementum et, commodo et nisl. Nulla facilisi. Proin vitae sagittis arcu. Nullam euismod magna non tempor tincidunt. In vitae quam id enim ornare ultrices. Fusce tristique ultricies tortor, at elementum magna condimentum nec. Integer lectus velit, fermentum quis urna eu, rhoncus tristique lectus.'
		]);

		\App\ArticleComment::create([
			'user_id' => 8,
			'article_id' => 3,
			
			'comment' => 'Proin sapien odio, posuere non elementum et, commodo et nisl. Nulla facilisi. Proin vitae sagittis arcu. Nullam euismod magna non tempor tincidunt. In vitae quam id enim ornare ultrices. Fusce tristique ultricies tortor, at elementum magna condimentum nec. Integer lectus velit, fermentum quis urna eu, rhoncus tristique lectus.'
		]);

		\App\ArticleComment::create([
			'user_id' => 4,
			'article_id' => 3,
			
			'comment' => 'Proin sapien odio, posuere non elementum et, commodo et nisl. Nulla facilisi. Proin vitae sagittis arcu. Nullam euismod magna non tempor tincidunt. In vitae quam id enim ornare ultrices. Fusce tristique ultricies tortor, at elementum magna condimentum nec. Integer lectus velit, fermentum quis urna eu, rhoncus tristique lectus.'
		]);

		\App\ArticleComment::create([
			'user_id' => 3,
			'article_id' => 5,
			
			'comment' => 'Proin sapien odio, posuere non elementum et, commodo et nisl. Nulla facilisi. Proin vitae sagittis arcu. Nullam euismod magna non tempor tincidunt. In vitae quam id enim ornare ultrices. Fusce tristique ultricies tortor, at elementum magna condimentum nec. Integer lectus velit, fermentum quis urna eu, rhoncus tristique lectus.'
		]);


		\App\ArticleComment::create([
			'user_id' => 5,
			'article_id' => 5,
			
			'comment' => 'Proin sapien odio, posuere non elementum et, commodo et nisl. Nulla facilisi. Proin vitae sagittis arcu. Nullam euismod magna non tempor tincidunt. In vitae quam id enim ornare ultrices. Fusce tristique ultricies tortor, at elementum magna condimentum nec. Integer lectus velit, fermentum quis urna eu, rhoncus tristique lectus.'
		]);

		\App\ArticleComment::create([
			'user_id' => 8,
			'article_id' => 5,
			
			'comment' => 'Proin sapien odio, posuere non elementum et, commodo et nisl. Nulla facilisi. Proin vitae sagittis arcu. Nullam euismod magna non tempor tincidunt. In vitae quam id enim ornare ultrices. Fusce tristique ultricies tortor, at elementum magna condimentum nec. Integer lectus velit, fermentum quis urna eu, rhoncus tristique lectus.'
		]);

		\App\ArticleComment::create([
			'user_id' => 4,
			'article_id' => 4,
			
			'comment' => 'Proin sapien odio, posuere non elementum et, commodo et nisl. Nulla facilisi. Proin vitae sagittis arcu. Nullam euismod magna non tempor tincidunt. In vitae quam id enim ornare ultrices. Fusce tristique ultricies tortor, at elementum magna condimentum nec. Integer lectus velit, fermentum quis urna eu, rhoncus tristique lectus.'
		]);

		\App\ArticleComment::create([
			'user_id' => 2,
			'article_id' => 4,
			
			'comment' => 'Proin sapien odio, posuere non elementum et, commodo et nisl. Nulla facilisi. Proin vitae sagittis arcu. Nullam euismod magna non tempor tincidunt. In vitae quam id enim ornare ultrices. Fusce tristique ultricies tortor, at elementum magna condimentum nec. Integer lectus velit, fermentum quis urna eu, rhoncus tristique lectus.'
		]);

		\App\ArticleComment::create([
			'user_id' => 5,
			'article_id' => 1,
			
			'comment' => 'Proin sapien odio, posuere non elementum et, commodo et nisl. Nulla facilisi. Proin vitae sagittis arcu. Nullam euismod magna non tempor tincidunt. In vitae quam id enim ornare ultrices. Fusce tristique ultricies tortor, at elementum magna condimentum nec. Integer lectus velit, fermentum quis urna eu, rhoncus tristique lectus.'
		]);

		\App\ArticleComment::create([
			'user_id' => 8,
			'article_id' => 1,
			
			'comment' => 'Proin sapien odio, posuere non elementum et, commodo et nisl. Nulla facilisi. Proin vitae sagittis arcu. Nullam euismod magna non tempor tincidunt. In vitae quam id enim ornare ultrices. Fusce tristique ultricies tortor, at elementum magna condimentum nec. Integer lectus velit, fermentum quis urna eu, rhoncus tristique lectus.'
		]);

		\App\ArticleComment::create([
			'user_id' => 4,
			'article_id' => 1,
			
			'comment' => 'Proin sapien odio, posuere non elementum et, commodo et nisl. Nulla facilisi. Proin vitae sagittis arcu. Nullam euismod magna non tempor tincidunt. In vitae quam id enim ornare ultrices. Fusce tristique ultricies tortor, at elementum magna condimentum nec. Integer lectus velit, fermentum quis urna eu, rhoncus tristique lectus.'
		]);

		\App\ArticleComment::create([
			'user_id' => 2,
			'article_id' => 1,
			
			'comment' => 'Proin sapien odio, posuere non elementum et, commodo et nisl. Nulla facilisi. Proin vitae sagittis arcu. Nullam euismod magna non tempor tincidunt. In vitae quam id enim ornare ultrices. Fusce tristique ultricies tortor, at elementum magna condimentum nec. Integer lectus velit, fermentum quis urna eu, rhoncus tristique lectus.'
		]);

		\App\ArticleComment::create([
			'user_id' => 5,
			'article_id' => 1,
			
			'comment' => 'Proin sapien odio, posuere non elementum et, commodo et nisl. Nulla facilisi. Proin vitae sagittis arcu. Nullam euismod magna non tempor tincidunt. In vitae quam id enim ornare ultrices. Fusce tristique ultricies tortor, at elementum magna condimentum nec. Integer lectus velit, fermentum quis urna eu, rhoncus tristique lectus.'
		]);

		\App\ArticleComment::create([
			'user_id' => 8,
			'article_id' => 1,
			
			'comment' => 'Proin sapien odio, posuere non elementum et, commodo et nisl. Nulla facilisi. Proin vitae sagittis arcu. Nullam euismod magna non tempor tincidunt. In vitae quam id enim ornare ultrices. Fusce tristique ultricies tortor, at elementum magna condimentum nec. Integer lectus velit, fermentum quis urna eu, rhoncus tristique lectus.'
		]);

		\App\ArticleComment::create([
			'user_id' => 4,
			'article_id' => 2,
			
			'comment' => 'Proin sapien odio, posuere non elementum et, commodo et nisl. Nulla facilisi. Proin vitae sagittis arcu. Nullam euismod magna non tempor tincidunt. In vitae quam id enim ornare ultrices. Fusce tristique ultricies tortor, at elementum magna condimentum nec. Integer lectus velit, fermentum quis urna eu, rhoncus tristique lectus.'
		]);

		\App\ArticleComment::create([
			'user_id' => 2,
			'article_id' => 3,
			
			'comment' => 'Proin sapien odio, posuere non elementum et, commodo et nisl. Nulla facilisi. Proin vitae sagittis arcu. Nullam euismod magna non tempor tincidunt. In vitae quam id enim ornare ultrices. Fusce tristique ultricies tortor, at elementum magna condimentum nec. Integer lectus velit, fermentum quis urna eu, rhoncus tristique lectus.'
		]);
	}

}
