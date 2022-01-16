# Symfony версия api mtg бота

Решил не просто почистить код проекта, а перенести его с Yii2 на Symfony 5.
Сложных архитектур тут особо нет, просто старался соблюсти SOLID принципы и использовать DI и REST.
Базу взял PostgreSQL, так как возможно потребуется хранить json альтернативных данных карт.
С Doctrine работать не привычно =)

Суть проекта в следующем, существует такая ККИ [Magic: The Gathering](https://ru.wikipedia.org/wiki/Magic:_The_Gathering).
Я ей увлекаюсь, и иногда возникает потребность купить/продать карты. Для определения цен есть множество площадок. 
Основные это [Star City](https://starcitygames.com) и [Topdeck](https://topdeck.ru).
Прыгать между ними не очень удобно, по этому решил написать телеграмм бота, который по средставам этого api будет получать цены с обеих платформ.
Своих открытых и описанных api у них нет, но некоторые точки входа я нашёл и разобрался как с ними работать.

Получение списка карт сета и цен происходит тут:
1. [Star City. Обычные](https://starcitygames.com/previews/innistrad-crimson-vow/foil?rarity=Mythic%20Rare,Rare&mpp=300)
2. [Star City. Foil](https://starcitygames.com/previews/innistrad-crimson-vow/?rarity=Mythic%20Rare,Rare&mpp=300)
3. [Получение русского названия](https://gatherer.wizards.com/Pages/Search/Default.aspx?name=+)
4. [TopDeck. Синглы](https://topdeck.ru/apps/toptrade/api-v1/singles/search?q=Dark+Ritual)
5. [TopDeck. Завершённые аукционы](https://topdeck.ru/apps/toptrade/api-v1/auctions/search?q=Jace)

С первой платформы получение данных происходит в полуавтоматическом режиме, так как ссылка зависит от названия сета (блок карт).
Обновление цен будет происходить по крону.