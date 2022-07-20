<?php

namespace common\models\defaults;

use common\models\User;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * DefaultActiveRecord is the base class for classes representing relational data in terms of objects.
 *
 * @property-read array $statusList
 * @property-read \yii\db\ActiveQuery $createdBy
 * @property-read \yii\db\ActiveQuery $updatedBy
 * @property-read string $statusName
 */
class DefaultActiveRecord extends ActiveRecord
{
    public const STATUS_DELETED = 3;
    public const STATUS_INACTIVE = 4;
    public const STATUS_ACTIVE = 5;

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class
        ];
    }

    public function attributeLabels(): array
    {
        return self::getAttributeLabels();
    }

    public static function getAttributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Nomi',
            'info' => "Qo'shimcha ma'lumot",
            'status' => 'Statusi',
            'created_at' => 'Yaratilgan vaqti',
            'updated_at' => "Yangilangan vaqti",
            'created_by' => 'Yaratdi',
            'updated_by' => 'Yangiladi',

            'course_id' => 'Kursi',
            'teacher_id' => "O'qituvchisi",
            'cost' => 'Narxi',
            'lesson' => 'Darslar soni',

            'phone' => "Telefon raqami",
            'gender' => "Jinsi",
            'born_date' => "Tug'ilgan sanasi",
            'username' => "Username",
            'password' => "Paroli"
        ];
    }

    public static function find(): DefaultQuery
    {
        return new DefaultQuery(static::class);
    }

    public function delete($force = false)
    {
        if ($force) {
            return parent::delete();
        }
        if ($this->hasAttribute('status')) {
            $this->status = self::STATUS_DELETED;
            return $this->save();
        }
        return false;
    }


    public static function getStatusList(): array
    {
        return [
            static::STATUS_DELETED => "O'chirilgan",
            static::STATUS_INACTIVE => 'Nofaol',
            static::STATUS_ACTIVE => 'Faol',
        ];
    }

    public function getStatusName(): string
    {
        $list = self::getStatusList();
        return $this->hasAttribute('status') ? $list[$this->status] ?? '-' : '-';
    }

    public function isActive(): bool
    {
        if ($this->hasAttribute('status')) {
            return $this->status === static::STATUS_ACTIVE;
        }
        return false;
    }

    public static function getList(bool $active = true, string $select = 'name'): array
    {
        $query = static::find();
        if ($active) {
            $query->andWhere(['status' => static::STATUS_ACTIVE]);
        }
        return $query->select($select)->indexBy('id')->column();
    }

    /**
     * @return ActiveQuery
     */
    public function getCreatedBy(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * @return ActiveQuery
     */
    public function getUpdatedBy(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }
}