<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Postulantes".
 *
 * @property int $idPostulantes
 * @property string $detalleOferta_idDetalleOferta
 * @property int $candidato_idcandidato
 *
 * @property Candidato $candidatoIdcandidato
 * @property DetalleOferta $detalleOfertaIdDetalleOferta
 */
class Postulantes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Postulantes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['detalleOferta_idDetalleOferta', 'candidato_idcandidato'], 'required'],
            [['candidato_idcandidato'], 'integer'],
            [['detalleOferta_idDetalleOferta'], 'string', 'max' => 45],
            [['candidato_idcandidato'], 'exist', 'skipOnError' => true, 'targetClass' => Candidato::className(), 'targetAttribute' => ['candidato_idcandidato' => 'idcandidato']],
            [['detalleOferta_idDetalleOferta'], 'exist', 'skipOnError' => true, 'targetClass' => DetalleOferta::className(), 'targetAttribute' => ['detalleOferta_idDetalleOferta' => 'idDetalleOferta']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPostulantes' => 'Id Postulantes',
            'detalleOferta_idDetalleOferta' => 'Detalle Oferta Id Detalle Oferta',
            'candidato_idcandidato' => 'Candidato Idcandidato',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCandidatoIdcandidato()
    {
        return $this->hasOne(Candidato::className(), ['idcandidato' => 'candidato_idcandidato']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleOfertaIdDetalleOferta()
    {
        return $this->hasOne(DetalleOferta::className(), ['idDetalleOferta' => 'detalleOferta_idDetalleOferta']);
    }
}
