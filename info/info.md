# Полезная информация

## Константы

В WordPress существуют специальные константы времени, созданные для удобства, чтобы не умножать постоянно секунды:
```
MINUTE_IN_SECONDS = 60
HOUR_IN_SECONDS   = 60  * MINUTE_IN_SECONDS
DAY_IN_SECONDS    = 24  * HOUR_IN_SECONDS
WEEK_IN_SECONDS   = 7   * DAY_IN_SECONDS
YEAR_IN_SECONDS   = 365 * DAY_IN_SECONDS
```

## Удаление ревизий

Удалить все ревизии из БД можно при помощи следующего запроса:
```sql
DELETE p,m,r FROM st_posts p LEFT JOIN st_postmeta m ON (p.ID = m.post_id) LEFT JOIN st_term_relationships r ON (p.ID = r.object_id) WHERE p.post_type = 'revision';
```
