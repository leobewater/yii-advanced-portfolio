<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string $name
 * @property string $tech_stack
 * @property string $description
 * @property string $start_date
 * @property string|null $end_date
 *
 * @property ProjectImage[] $projectImages
 * @property Testimonial[] $testimonials
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'tech_stack', 'description', 'start_date'], 'required'],
            [['tech_stack', 'description'], 'string'],
            [['start_date', 'end_date'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'tech_stack' => Yii::t('app', 'Tech Stack'),
            'description' => Yii::t('app', 'Description'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
        ];
    }

    /**
     * Gets query for [[ProjectImages]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getProjectImages()
    {
        return $this->hasMany(ProjectImage::class, ['project_id' => 'id']);
    }

    /**
     * Gets query for [[Testimonials]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getTestimonials()
    {
        return $this->hasMany(Testimonial::class, ['project_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ProjectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectQuery(get_called_class());
    }

    public function saveImage()
    {
        // use db transaction
        Yii::$app->db->transaction(function ($db) {
            /**
             * @var $db yii\db\Connection
             */

            // save to file db table
            $file = new File();
            $file->name = uniqid(true) . '.' . $this->imageFile->extension;
            $file->base_url = Yii::$app->urlManager->createAbsoluteUrl(Yii::$app->params['uploads']['projects']);
            $file->mime_type = mime_content_type($this->imageFile->tempName);
            $file->save();

            // save reference in project image db table
            $projectImage = new ProjectImage();
            $projectImage->project_id = $this->id;
            $projectImage->file_id = $file->id;
            $projectImage->save();

            // save the image into /web/uploads/projects
            // if it's failed, rollback
            if(!$this->imageFile->saveAs(Yii::$app->params['uploads']['projects'] . '/' . $file->name)) {
                $db->transaction->rollBack();
            }
        });
    }
}
