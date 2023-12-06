Video: https://www.udemy.com/course/yii-2-from-beginner-to-expert/learn/lecture/33046798

Repo: https://github.com/lmsmartins/portfolio-advanced


```bash
> composer create-project yiisoft/yii2-app-advanced yii-advanced-portfolio

# Set Dev or Prod env
> php init

# To Run go to project folder
> docker-compose up

# To view frontend
> http://127.0.0.1:20080/

# To view backend
> http://127.0.0.1:21080/

# /environments/dev|prod/common/config files are the default files when php init, it will copy to the /common/config/main-local.php file
> php init

# apply user table migration
> php yii migrate

# register a user in frontend, if mail service not set up yet, view the log email file at /frontend/runtime/mail/xxx.eml
# once registered an account via the frontend, you can also login to the backend

> php yii migrate/create alter_date_columns_in_project_table

# after altering the column data type, need to re-generate the model and crud

# Date Picker
# https://www.yiiframework.com/extension/yiisoft/yii2-jui/doc/api/2.0/yii-jui-datepicker

> php yii migrate/create add_path_url_columns_to_file_table --fields="path_url:string"
> php yii migrate/create fix_file_foreign_key_in_tersimonial_table
```