<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

/**
 * UsersSearch represents the model behind the search form of `app\models\Users`.
 */
class UsersSearch extends Users
{

    public $outputRole;
    public $fullName;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['email', 'auth_key', 'password_hash', 'password_reset_token', 'verification_token', 'fullName', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Users::find();

        if($this->outputRole) {
            $query->innerJoinWith('user_roles', 'Users.id = user_roles.user_id')
                ->andWhere(['user_roles.role_id' => $this->outputRole]);
        }
        else {
            $usersWithRole = ArrayHelper::getColumn(UserRoles::find()->select(['user_id'])->asArray()->all(),'user_id');
            $query->where(['NOT IN','id',$usersWithRole]);
        }

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['fullName'] = [
            'asc' => ['last_name' => SORT_ASC, 'first_name' => SORT_ASC],
            'desc' => ['last_name' => SORT_DESC, 'first_name' => SORT_DESC],
            'label' => 'fullName',
            'default' => SORT_ASC
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'verification_token', $this->verification_token]);

        $query->andFilterWhere([
            'or',
            ['like', 'last_name', $this->fullName],
            ['like', 'first_name', $this->fullName],
        ]);

        return $dataProvider;
    }
}
