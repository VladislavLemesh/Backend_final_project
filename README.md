# FinalProject

http://45.131.41.122:7777/

Многостраничный приложение, реализованное с использованием стека технологий: Nginx, PHP-fpm, Composer, Symfony, Doctrine.

После авторизации, открывается доступ к следующим вкладкам:
1) Главная (содержит какой-то контент, который обычно размещается на главной странице(ничего не придумал)) Контент берется из таблицы Page базы данных
2) Мои видео (содержит Названия, Категории и видео) данные берутся из таблицы Video 
3) Мои категории (содержит названия категории) данные берутся из таблицы category, при нажатии на название категории открывается страница содержащая видео из данной категории
4) Добавить видео (содержит форму для добавления видео)(з.ы. в поле yotube_Id вводится последняя часть ссылки на видео. Например ссылка: https://youtu.be/S6OjDU44bMo, тогда ввести нужно: S6OjDU44bMo)
5) Авторы (содержит имена авторов) данные берутся из таблицы Author
6) Добавить автора (содержит форму для добавления автора)

таблицы Video и category связаны отношением ManyToOne

таблицы Video и Author связаны отношением ManyToMany