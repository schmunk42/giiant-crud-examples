./yii giiant-batch \
    --interactive=0 \
    --overwrite=1 \
    --enableI18N=1 \
    --messageCategory=app \
    --modelNamespace=giiant\\world\\models \
    --crudControllerNamespace=giiant\\world\\controllers \
    --crudSearchModelNamespace=giiant\\world\\models\\search \
    --crudViewPath=@app/extensions/world/views \
    --crudPathPrefix= \
    --crudProviders=schmunk42\\giiant\\crud\\providers\\DateTimeProvider \
    --tables=City,Country,CountryLanguage