# Artisan Commands

## Create A Model

without migration

```sh
php artisan oschool:make-model [ModelName] [ModuleName]
```

with migration

```sh
php artisan oschool:make-model [ModelName] [ModuleName] -m
```

## Create A Migration

```sh
php artisan oschool:make-migration [MigrationName] [ModuleName]
```
`MigrationName` should be indicated without module prefix. (e.g. **user_role** not **user_management__user_role**)