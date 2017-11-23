<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SourceEmailRecipientsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SourceEmailRecipientsTable Test Case
 */
class SourceEmailRecipientsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SourceEmailRecipientsTable
     */
    public $SourceEmailRecipients;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.source_email_recipients',
        'app.sources',
        'app.allocations',
        'app.form_locations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SourceEmailRecipients') ? [] : ['className' => 'App\Model\Table\SourceEmailRecipientsTable'];
        $this->SourceEmailRecipients = TableRegistry::get('SourceEmailRecipients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SourceEmailRecipients);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
