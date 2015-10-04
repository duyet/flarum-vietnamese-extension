<?php namespace FlarumVietnamese;

use Flarum\Support\Extension as BaseExtension;
use Illuminate\Events\Dispatcher;
use Flarum\Events\RegisterLocales;
use Flarum\Events\BuildClientView;

class Extension extends BaseExtension
{
    public function listen(Dispatcher $events)
    {
        $events->listen(RegisterLocales::class, function (RegisterLocales $event) {
            $event->manager->addLocale('vi', 'Vietnamese');
            $event->addTranslations('vi', __DIR__.'/../locale/core.yml');
            $event->manager->addJsFile('vi', __DIR__.'/../locale/core.js');
            $event->manager->addConfig('vi', __DIR__.'/../locale/core.php');
            $event->addTranslations('vi', __DIR__.'/../locale/likes.yml');
            $event->addTranslations('vi', __DIR__.'/../locale/lock.yml');
            $event->addTranslations('vi', __DIR__.'/../locale/mentions.yml');
            $event->addTranslations('vi', __DIR__.'/../locale/pusher.yml');
            $event->addTranslations('vi', __DIR__.'/../locale/sticky.yml');
            $event->addTranslations('vi', __DIR__.'/../locale/subscriptions.yml');
            $event->addTranslations('vi', __DIR__.'/../locale/tags.yml');
        });
		
		$events->listen(BuildClientView::class, [$this, 'addAssets']);
    }
	
	public function addAssets(BuildClientView $event){
		 $event->forumAssets([
			__DIR__.'/../less/forum/extension.less'
		]);
	}
}
