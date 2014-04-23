<?php
App::uses('ExamsController', 'Controller');

/**
 * ExamsController Test Case
 *
 */
class ExamsControllerTest extends ControllerTestCase {

/**
 * autoFixtures property
 *
 * @var boolean
 */
	public $autoFixtures = false;

/**
 * fixtures property
 *
 * @var array
 */
	public $fixtures = array(
		'app.exam', 'app.exam_format', 'app.exam_state', 'app.item', 'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Exams = $this->generate('Exams', array(
			'components' => array(
				'Auth',
			)
		));

		$this->Exams->Auth->staticExpects($this->any())
			->method('user')
			->with('id')
			->will($this->returnValue(1));

		$this->loadFixtures('Exam');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		parent::tearDown();

		unset($this->Exams);
	}

/**
 * testIndexGet method
 *
 * @return void
 */
	public function testIndexGet() {
		$this->loadFixtures('ExamState');

		$this->testAction('/exams/index', array('method' => 'get', 'return' => 'contents'));
		$this->assertInternalType('array', $this->vars['exams']);
		$this->assertRegExp('/<html/', $this->contents);
		$this->assertRegExp('/<table/', $this->view);
	}

/**
 * testViewGet method
 *
 * @return void
 */
	public function testViewGet() {
		$this->loadFixtures('Item', 'User');

		$this->testAction('/exams/view/1', array('method' => 'get', 'return' => 'contents'));
		$this->assertInternalType('array', $this->vars['exam']);
		$this->assertRegExp('/<html/', $this->contents);
		$this->assertRegExp('/<dl/', $this->view);
	}

/**
 * testViewGetNotFound method
 *
 * @return void
 */
	public function testViewGetNotFound() {
		$this->loadFixtures('Item', 'User');

		$this->setExpectedException('NotFoundException');
		$this->testAction('/exams/view/0', array('method' => 'get', 'return' => 'contents'));
	}

/**
 * testAddGet method
 *
 * @return void
 */
	public function testAddGet() {
		$this->loadFixtures('ExamFormat');

		$this->testAction('/exams/add', array('method' => 'get', 'return' => 'contents'));
		$this->assertInternalType('array', $this->vars['examFormats']);
		$this->assertRegExp('/<html/', $this->contents);
		$this->assertRegExp('/<form/', $this->view);
	}

/**
 * testAddPost method
 *
 * @return void
 */
	public function testAddPost() {
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

/**
 * testDeleteGet method
 *
 * @return void
 */
	public function testDeleteGet() {
		$this->loadFixtures('ExamFormat');

		$this->setExpectedException('MethodNotAllowedException');
		$this->testAction('/exams/delete/1', array('method' => 'get', 'return' => 'contents'));
	}

/**
 * testDeletePost method
 *
 * @return void
 */
	public function testDeletePost() {
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

/**
 * testStevieGet method
 *
 * @return void
 */
	public function testStevieGet() {
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

/**
 * testStevieGetNotFound method
 *
 * @return void
 */
	public function testStevieGetNotFound() {
		$this->setExpectedException('NotFoundException');
		$this->testAction('/exams/stevie/0', array('method' => 'get', 'return' => 'contents'));
	}

/**
 * testReportGet method
 *
 * @return void
 */
	public function testReportGet() {
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

/**
 * testReportGetNotFound method
 *
 * @return void
 */
	public function testReportGetNotFound() {
		$this->setExpectedException('NotFoundException');
		$this->testAction('/exams/report/0', array('method' => 'get', 'return' => 'contents'));
	}

/**
 * testReanalyseGet method
 *
 * @return void
 */
	public function testReanalyseGet() {
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

/**
 * testScoresGet method
 *
 * @return void
 */
	public function testScoresGet() {
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

/**
 * testScoresGetNotFound method
 *
 * @return void
 */
	public function testScoresGetNotFound() {
		$this->setExpectedException('NotFoundException');
		$this->testAction('/exams/scores/0', array('method' => 'get', 'return' => 'contents'));
	}

/**
 * testMissingsGet method
 *
 * @return void
 */
	public function testMissingsGet() {
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

/**
 * testMissingsGetNotFound method
 *
 * @return void
 */
	public function testMissingsGetNotFound() {
		$this->setExpectedException('NotFoundException');
		$this->testAction('/exams/missings/0', array('method' => 'get', 'return' => 'contents'));
	}

}
