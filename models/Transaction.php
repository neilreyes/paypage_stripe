<?php class Transaction
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function createTransaction($data)
    {
        // Prepare Query
        $this->db->query('
		INSERT INTO
		transactions (id, amount, currency, customer_id, product, status)
		VALUES(:id, :amount, :currency, :customer_id, :product, :status)');

        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':amount', $data['amount']);
        $this->db->bind(':currency', $data['currency']);
        $this->db->bind(':customer_id', $data['customer_id']);
        $this->db->bind(':product', $data['product']);
        $this->db->bind(':status', $data['status']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function readTransactions()
    {
        $this->db->query('
			SELECT * FROM transactions
			ORDER BY created_at DESC
		');

        return $this->db->resultset();
    }

    public function updateTransaction($data)
    {
    }

    public function deleteTransaction($data)
    {
    }
}
