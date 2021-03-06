<?php

namespace ManipleMailer\Entity;

use ManipleMailer\Address;
use ManipleMailer\ContentType;

/**
 * @Entity
 * @Table(
 *     name="mailer_campaigns",
 *     indexes={
 *         @Index(columns={"created_by"})
 *     }
 * )
 */
class Campaign
{
    /**
     * @Id
     * @Column(name="campaign_id", type="integer")
     * @GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $id;

    /**
     * @Column(name="created_at", type="epoch")
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @ManyToOne(targetEntity="\ManipleUser_Entity_User")
     * @JoinColumn(name="created_by", referencedColumnName="user_id")
     * @var \ManipleUser_Entity_User
     */
    protected $createdBy;

    /**
     * @Column(name="started_at", type="epoch", nullable=true)
     * @var \DateTime
     */
    protected $startedAt;

    /**
     * @Column(name="completed_at", type="epoch", nullable=true)
     * @var \DateTime
     */
    protected $completedAt;

    /**
     * @Column(name="message_count", type="integer", options={"default"=0})
     * @var int
     */
    protected $messageCount = 0;

    /**
     * @Column(name="sent_message_count", type="integer", options={"default"=0})
     * @var int
     */
    protected $sentMessageCount = 0;

    /**
     * @Column(name="failed_message_count", type="integer", options={"default"=0})
     * @var int
     */
    protected $failedMessageCount = 0;

    /**
     * @Column(name="read_message_count", type="integer", options={"default"=0})
     * @var int
     */
    protected $readMessageCount = 0;

    /**
     * @Column(name="reply_to_email", type="string", length=255, nullable=true)
     * @var string
     */
    protected $replyToEmail;

    /**
     * @Column(name="reply_to_name", type="string", length=255, nullable=true)
     * @var string
     */
    protected $replyToName;

    /**
     * @Column(name="subject_template", type="string", length=255)
     * @var string
     */
    protected $subjectTemplate;

    /**
     * @Column(name="content_type", type="string", length=16)
     * @var string
     */
    protected $contentType;

    /**
     * @Column(name="content_template", type="text")
     * @var string
     */
    protected $contentTemplate;

    public function __construct()
    {
        $this->setCreatedAt(new \DateTime('now'));
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Campaign
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return Campaign
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \ManipleUser_Entity_User
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @param \ManipleUser_Entity_User $createdBy
     * @return Campaign
     */
    public function setCreatedBy(\ManipleUser_Entity_User $createdBy = null)
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartedAt()
    {
        return $this->startedAt;
    }

    /**
     * @param \DateTime $startedAt
     * @return Campaign
     */
    public function setStartedAt(\DateTime $startedAt = null)
    {
        $this->startedAt = $startedAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCompletedAt()
    {
        return $this->completedAt;
    }

    /**
     * @param \DateTime $completedAt
     * @return Campaign
     */
    public function setCompletedAt(\DateTime $completedAt = null)
    {
        $this->completedAt = $completedAt;
        return $this;
    }

    /**
     * @return int
     */
    public function getMessageCount()
    {
        return $this->messageCount;
    }

    /**
     * @param int $messageCount
     * @return Campaign
     */
    public function setMessageCount($messageCount)
    {
        $this->messageCount = $messageCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getSentMessageCount()
    {
        return $this->sentMessageCount;
    }

    /**
     * @param int $sentMessageCount
     * @return Campaign
     */
    public function setSentMessageCount($sentMessageCount)
    {
        $this->sentMessageCount = $sentMessageCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getFailedMessageCount()
    {
        return $this->failedMessageCount;
    }

    /**
     * @param int $failedMessageCount
     * @return Campaign
     */
    public function setFailedMessageCount($failedMessageCount)
    {
        $this->failedMessageCount = $failedMessageCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getReadMessageCount()
    {
        return $this->readMessageCount;
    }

    /**
     * @param int $readMessageCount
     * @return Campaign
     */
    public function setReadMessageCount($readMessageCount)
    {
        $this->readMessageCount = $readMessageCount;
        return $this;
    }

    /**
     * @return Address
     */
    public function getReplyTo()
    {
        if (null === $this->replyToEmail) {
            return null;
        }
        return new Address($this->replyToEmail, $this->replyToName);
    }

    /**
     * @param Address $replyTo
     * @return Campaign
     */
    public function setReplyTo(Address $replyTo = null)
    {
        if (null === $replyTo) {
            $this->replyToEmail = null;
            $this->replyToName = null;
        } else {
            $this->replyToEmail = $replyTo->getEmail();
            $this->replyToName = $replyTo->getName();
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getSubjectTemplate()
    {
        return $this->subjectTemplate;
    }

    /**
     * @param string $subjectTemplate
     * @return Campaign
     */
    public function setSubjectTemplate($subjectTemplate)
    {
        $this->subjectTemplate = $subjectTemplate;
        return $this;
    }

    /**
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @param string $contentType
     * @return Campaign
     */
    public function setContentType($contentType)
    {
        if ($contentType !== null) {
            $contentType = ContentType::assert($contentType);
        }
        $this->contentType = $contentType;
        return $this;
    }

    /**
     * @return string
     */
    public function getContentTemplate()
    {
        return $this->contentTemplate;
    }

    /**
     * @param string $contentTemplate
     * @return Campaign
     */
    public function setContentTemplate($contentTemplate)
    {
        $this->contentTemplate = $contentTemplate;
        return $this;
    }
}
