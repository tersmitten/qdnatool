<?php
App::uses('ClassRegistry', 'Utility');
App::uses('DevelopmentPhase', 'Model');
App::uses('ExamFormat', 'Model');
App::uses('ExamState', 'Model');
App::uses('Instruction', 'Model');
App::uses('QuestionFormat', 'Model');
App::uses('Role', 'Model');
class AppSchema extends CakeSchema {

	public function before($event = array()) {
		$db = ConnectionManager::getDataSource('default');
		$db->cacheSources = false;
		return true;
	}

	public function after($event = array()) {
		if (isset($event['create'])) {
			switch ($event['create']) {
				case 'development_phases':
					$developmentPhase = ClassRegistry::init('DevelopmentPhase');
					$developmentPhase->create();
					$developmentPhase->saveAll(
						array(
							array(
								'id' => DevelopmentPhase::DIVERGE,
								'name_eng' => 'Diverge',
								'name_nld' => 'Divergeren'
							),
							array(
								'id' => DevelopmentPhase::CONVERGE,
								'name_eng' => 'Converge',
								'name_nld' => 'Convergeren'
							)
						)
					);
					break;
				case 'exam_formats':
					$examFormat = ClassRegistry::init('ExamFormat');
					$examFormat->create();
					$examFormat->saveAll(
						array(
							array(
								'id' => ExamFormat::TELEFORM,
								'name' => 'Teleform'
							),
							array(
								'id' => ExamFormat::BLACKBOARD,
								'name' => 'Blackboard'
							),
							array(
								'id' => ExamFormat::QMP,
								'name' => 'QMP'
							)
						)
					);
					break;
				case 'exam_states':
					$examState = ClassRegistry::init('ExamState');
					$examState->create();
					$examState->saveAll(
						array(
							array(
								'id' => ExamState::UPLOADED,
								'name_eng' => 'Uploaded',
								'name_nld' => 'Geupload'),
							array(
								'id' => ExamState::IMPORTED,
								'name_eng' => 'Imported',
								'name_nld' => 'Geïmporteerd'
							),
							array(
								'id' => ExamState::ANALYSED,
								'name_eng' => 'Analysed',
								'name_nld' => 'Geanalyseerd'
							),
							array(
								'id' => ExamState::UPLOAD_FAILED,
								'name_eng' => 'Upload failed',
								'name_nld' => 'Uploaden mislukt'
							),
							array(
								'id' => ExamState::IMPORT_FAILED,
								'name_eng' => 'Import failed',
								'name_nld' => 'Importeren mislukt'
							),
							array(
								'id' => ExamState::ANALYSE_FAILED,
								'name_eng' => 'Analyse failed',
								'name_nld' => 'Analyseren mislukt'
							),
							array(
								'id' => ExamState::IMPORTING,
								'name_eng' => 'Importing',
								'name_nld' => 'Bezig met importeren'
							),
							array(
								'id' => ExamState::WAITING_TO_ANALYSE,
								'name_eng' => 'Waiting to analyse',
								'name_nld' => 'Wachten om te analyseren'
							),
							array(
								'id' => ExamState::REPORT_GENERATED,
								'name_eng' => 'Report generated',
								'name_nld' => 'Rapport gegenereerd'
							),
							array(
								'id' => ExamState::GENERATING_REPORT,
								'name_eng' => 'Generating report',
								'name_nld' => 'Bezig met genereren rapport'
							),
							array(
								'id' => ExamState::WAITING_TO_GENERATE_REPORT,
								'name_eng' => 'Waiting to generate report',
								'name_nld' => 'Wachten op het genereren van rapport'),
							array(
								'id' => ExamState::REPORT_FAILED,
								'name_eng' => 'Report failed',
								'name_nld' => 'Rapport mislukt'),
							array(
								'id' => ExamState::WAITING_TO_IMPORT,
								'name_eng' => 'Waiting to import',
								'name_nld' => 'Wachten op importeren'),
							array(
								'id' => ExamState::DUPLICATED,
								'name_eng' => 'Duplicated',
								'name_nld' => 'Gedupliceerd'),
							array(
								'id' => ExamState::WAITING_TO_REANALYSE,
								'name_eng' => 'Waiting to reanalyse',
								'name_nld' => 'Wachten op heranalyseren'),
							array(
								'id' => ExamState::REANALYSED,
								'name_eng' => 'Reanalysed',
								'name_nld' => 'Heranalyseerd'),
							array(
								'id' => ExamState::REANALYSE_FAILED,
								'name_eng' => 'Reanalyse failed',
								'name_nld' => 'Heranalyse mislukt'
							),
						)
					);
					break;
				case 'instructions':
					$instruction = ClassRegistry::init('Instruction');
					$instruction->create();
					$instruction->saveAll(
						array(
							array(
								'id' => 1,
								'development_phase_id' => DevelopmentPhase::DIVERGE,
								'question_format_id' => null,
								'url' => 'http://docs.qdnatool.org/ontwerpen/generating-questions/'
							),
							array(
								'id' => 2,
								'development_phase_id' => DevelopmentPhase::CONVERGE,
								'question_format_id' => null,
								'url' => 'http://docs.qdnatool.org/ontwerpen/convergeer-vragen/'
							),
							array(
								'id' => 3,
								'development_phase_id' => DevelopmentPhase::DIVERGE,
								'question_format_id' => QuestionFormat::TRUE_FALSE,
								'url' => 'http://docs.qdnatool.org/ontwerpen/1-4-voor-en-nadelen-open-en-gesloten-vragen/wat-is/genereer-juistonjuist-vragen/'
							),
							array(
								'id' => 4,
								'development_phase_id' => DevelopmentPhase::CONVERGE,
								'question_format_id' => QuestionFormat::TRUE_FALSE,
								'url' => 'http://docs.qdnatool.org/ontwerpen/1-4-voor-en-nadelen-open-en-gesloten-vragen/wat-is/bijschaafregels-voor-juistonjuist-vragen/'
							),
							array(
								'id' => 5,
								'development_phase_id' => DevelopmentPhase::DIVERGE,
								'question_format_id' => QuestionFormat::MULTIPLE_CHOICE,
								'url' => 'http://docs.qdnatool.org/ontwerpen/1-4-voor-en-nadelen-open-en-gesloten-vragen/multiple-choice-vraag/divergeer-multiple-choice-vragen/'
							),
							array(
								'id' => 6,
								'development_phase_id' => DevelopmentPhase::CONVERGE,
								'question_format_id' => QuestionFormat::MULTIPLE_CHOICE,
								'url' => 'http://docs.qdnatool.org/ontwerpen/1-4-voor-en-nadelen-open-en-gesloten-vragen/multiple-choice-vraag/convergeer-multiple-choicevragen/'
							),
							array(
								'id' => 7,
								'development_phase_id' => DevelopmentPhase::DIVERGE,
								'question_format_id' => QuestionFormat::MULTIPLE_RESPONSE,
								'url' => 'http://docs.qdnatool.org/ontwerpen/1-4-voor-en-nadelen-open-en-gesloten-vragen/multiple-responsvraag/divergeer-multiple-responsvraag/'
							),
							array(
								'id' => 8,
								'development_phase_id' => DevelopmentPhase::CONVERGE,
								'question_format_id' => QuestionFormat::MULTIPLE_RESPONSE,
								'url' => 'http://docs.qdnatool.org/ontwerpen/1-4-voor-en-nadelen-open-en-gesloten-vragen/multiple-responsvraag/convergeer-multiple-responsvragen/'
							),
							array(
								'id' => 9,
								'development_phase_id' => DevelopmentPhase::DIVERGE,
								'question_format_id' => QuestionFormat::OPEN_ANSWER,
								'url' => 'http://docs.qdnatool.org/ontwerpen/1-4-voor-en-nadelen-open-en-gesloten-vragen/1-2-open-vraag/divergeer-open-vraag/'
							),
							array(
								'id' => 10,
								'development_phase_id' => DevelopmentPhase::CONVERGE,
								'question_format_id' => QuestionFormat::OPEN_ANSWER,
								'url' => 'http://docs.qdnatool.org/ontwerpen/1-4-voor-en-nadelen-open-en-gesloten-vragen/1-2-open-vraag/convergeer-open-vraag/'
							),
						)
					);
					break;
				case 'question_formats':
					$questionFormat = ClassRegistry::init('QuestionFormat');
					$questionFormat->create();
					$questionFormat->saveAll(
						array(
							array(
								'id' => QuestionFormat::TRUE_FALSE,
								'name' => 'T/F'
							),
							array(
								'id' => QuestionFormat::MULTIPLE_CHOICE,
								'name' => 'mc'
							),
							array(
								'id' => QuestionFormat::MULTIPLE_RESPONSE,
								'name' => 'mr'
							),
							array(
								'id' => QuestionFormat::OPEN_ANSWER,
								'name' => 'open'
							)
						)
					);
					break;
				case 'roles':
					$role = ClassRegistry::init('Role');
					$role->create();
					$role->saveAll(
						array(
							array(
								'id' => Role::USER,
								'name' => 'User'
							),
							array(
								'id' => Role::ADMIN,
								'name' => 'Administrator'
							)
						)
					);
					break;
				default:
					break;
			}
		}
	}

	public $answer_options = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'order' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'value' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'is_correct' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'given_answer_count' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'given_answer_irc' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '4,3'),
		'given_answer_percentage' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '4,1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'item_id' => array('column' => 'item_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $development_phases = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name_nld' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'name_eng' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $exam_formats = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $exam_states = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'name_eng' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'name_nld' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $exams = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'key' => 'index'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'exam_state_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'key' => 'index'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'exam_format_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'key' => 'index'),
		'data_filename' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'mapping_filename' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'answer_option_count' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'max_answer_option_count' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'average_score' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,3'),
		'standard_deviation' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,8'),
		'cronbachs_alpha' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '4,3'),
		'report_filename' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'uploaded' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'imported' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'duplicated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'analysed' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'report_generated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'deleted' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'user_id' => array('column' => 'user_id', 'unique' => 0),
			'exam_format_id' => array('column' => 'exam_format_id', 'unique' => 0),
			'exam_state_id' => array('column' => 'exam_state_id', 'unique' => 0),
			'parent_id' => array('column' => 'parent_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $given_answers = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'subject_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'value' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'content' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'score' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'item_id' => array('column' => 'item_id', 'unique' => 0),
			'subject_id' => array('column' => 'subject_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $images = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'question_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'filename' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'extension' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'filesize' => array('type' => 'integer', 'null' => true, 'default' => null),
		'file_type' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $instructions = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'development_phase_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'question_format_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'url' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'content' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'development_phase_id' => array('column' => 'development_phase_id', 'unique' => 0),
			'question_format_id' => array('column' => 'question_format_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $items = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'exam_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'order' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'second_version_order' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'value' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'answer_option_count' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'correct_answer_count' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'correct_answer_percentage' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '4,1'),
		'correct_answer_irc' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '4,3'),
		'missing_answer_count' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'missing_answer_percentage' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '4,1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'exam_id' => array('column' => 'exam_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $question_answers = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'question_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'name' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'feedback' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'is_correct' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'order' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'question_id' => array('column' => 'question_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $question_formats = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $questions = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'code' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'question_format_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'development_phase_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'stimulus' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'comment' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'answer' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'feedback_when_wrong' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'feedback_when_correct' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'user_id' => array('column' => 'user_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $questions_tags = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'question_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'tag_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $queued_tasks = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'job_type' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'data' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'group' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'reference' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'not_before' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'fetched' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'completed' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'failed' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'failure_message' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'worker_key' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $roles = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $subjects = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'exam_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'value' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'is_second_version' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'exam_id' => array('column' => 'exam_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $tags = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'user_id' => array('column' => 'user_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $tips = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'content' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $users = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'username' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'password' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'role_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'surfconext_identifier' => array('type' => 'string', 'null' => true, 'default' => null, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'surfconext_identifier' => array('column' => 'surfconext_identifier', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

}
